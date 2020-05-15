<?php 
namespace App\APIConsumer;
class APIConsumer {
	protected $worker;
	protected $baseUri;

	/**
	 * Constructor
	 * @method __construct
	 */
	public function __construct()
	{
		$this->worker = new WorkerHTTP();
	}

	/**
	 * generate url
	 * @method generateUrl
	 * @param  string      $node [description]
	 * @return string            [description]
	 */
	protected function generateUrl($node)
	{
		return $this->baseUri . "/" . $node;
	}

	/**
	 * execute request
	 * @method executeRequest
	 * @param  [type]         $node   [description]
	 * @param  [type]         $method [description]
	 * @param  array          $params [description]
	 * @return [type]                 [description]
	 */
	public function executeRequest($node, $method, $params = [])
	{
		$this->worker->setUrl($this->generateUrl($node));
		return $this->worker->sendRequest($params, $method);
	}
}