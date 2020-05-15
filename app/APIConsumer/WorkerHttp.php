<?php
namespace App\APIConsumer; 
class WorkerHTTP {
	private $url;
	private $header;

	/**
	 * [setUrl description]
	 * @method setUrl
	 * @param  [type] $url [description]
	 */
	public function setUrl($url){
		$this->url = $url;
	}

	/**
	 * [setHeader description]
	 * @method setHeader
	 * @param  array     $header [description]
	 */
	public function setHeader(array $header)
	{
		$this->header = $header;
	}
	
	/**
	 * [sendRequest description]
	 * @method sendRequest
	 * @param  [type]      $params [description]
	 * @param  string      $method [description]
	 * @return [type]              [description]
	 */
	public function sendRequest($params=null, $method="GET"){
		$ch = curl_init();
		if(!empty($params)) {
			$this->url .= "?" . http_build_query($params, '', '&');
		}
		curl_setopt($ch, CURLOPT_URL, $this->url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
		if(!empty($this->header)) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);	
		}
		$response = curl_exec($ch); 
		curl_close($ch); 
		return $response;
	} 
}