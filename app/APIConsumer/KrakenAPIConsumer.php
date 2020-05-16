<?php 
namespace App\APIConsumer;

class KrakenAPIConsumer extends APIConsumer {

	private $accessToken;
	private $host;
	/**
	 * constructor
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->baseUri = config('kraken.kraken_host') . "/api/kraken";
		$this->authenticate();
	}

	/**
	 * obtain the access token for the api
	 * @method authenticate
	 * @return null       [description]
	 */
	private function authenticate()
	{
		$node = "login";
		$params = ["email" => config("kraken.api_user"), "password" => config("kraken.api_user_pswd")];
		$this->worker->setHeader($this->buildHeader());
		$data = $this->executeRequest($node, "POST", $params);

		if($data) {
			$data = json_decode($data);
			if(isset($data->success) && $data->success) {
				$this->accessToken = $data->data->token;
				$this->worker->setHeader($this->buildHeader());
			}
		}
		
	}

	/**
	 * build header for autorization
	 * @method buildHeader
	 * @return array      [description]
	 */
	private function buildHeader()
	{
		$header = [
			'Content-Length: 0',
			'Accept:application/json',
		    'Content-Type: application/json; charset=utf-8',
		    'X-Requested-With: XMLHttpRequest'
		];
		if($this->accessToken) {
			$header[] = 'Authorization: Bearer ' . $this->accessToken;
		}

		return $header;
	}

	/**
	 * Request to create a kraken
	 * @method createKraken
	 * @param  array       $params [description]
	 * @return string               [description]
	 */
	public function createKraken($params)
	{
		$node = "create";
		return $this->executeRequest($node, "POST", $params);
	}

	public function addTentacle($params)
	{
		$node = "tentacle";
		return $this->executeRequest($node, "POST", $params);
	}

	public function addPower($params)
	{
		$node = "power";
		return $this->executeRequest($node, "POST", $params);
	}

	public function getKrakens()
	{
		$node = "summary";
		return $this->executeRequest($node, "GET");
	}

	public function deleteTentacle($id)
	{
		$node = "tentacle/" . $id;
		return $this->executeRequest($node, "DELETE");
	}
}