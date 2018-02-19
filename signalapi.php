<?php
 require 'vendor/autoload.php';
 use GuzzleHttp\Client; 
 use GuzzleHttp\Exception\RequestException;
 use GuzzleHttp\Psr7\Request;

Class CloudwaysAPIClient
{
	private $client = null;
	const API_URL = "https://onesignal.com/api/v1";
	var $app_key;
	var $auth_key;
    var $accessToken;
	public function __construct($app_key,$auth_key)
	{
		$this->app_key = $app_key;
		$this->auth_key = $auth_key;
		$this->client = new Client();
		//$this->prepare_access_token();
	}
	// public function prepare_access_token()
	// {
	// 	try
	// 	{
	// 		$url = self::API_URL;
	// 		$data = ['app_key' => $this->app_key,'api_key' => $this->auth_key];
	// 		$response = $this->client->post($url, ['query' => $data]);
	// 		echo $result = json_decode($response->getBody()->getContents());
    //         exit();
	// 		$this->accessToken = $result->access_token;
	// 	}
	// 	catch (RequestException $e)
	// 	{
	// 		$response = $this->StatusCodeHandling($e);
	// 		return $response;
	// 	}
	// }
	// public function StatusCodeHandling($e)
	// {
	// 	if ($e->getResponse()->getStatusCode() == '400')
	// 	{
	// 		$this->prepare_access_token();
	// 	}
	// 	elseif ($e->getResponse()->getStatusCode() == '422')
	// 	{
	// 		$response = json_decode($e->getResponse()->getBody(true)->getContents());
	// 		return $response;
	// 	}
	// 	elseif ($e->getResponse()->getStatusCode() == '500')
	// 	{
	// 		$response = json_decode($e->getResponse()->getBody(true)->getContents());
	// 		return $response;
	// 	}
	// 	elseif ($e->getResponse()->getStatusCode() == '401')
	// 	{
	// 		$response = json_decode($e->getResponse()->getBody(true)->getContents());
	// 		return $response;
	// 	}
	// 	elseif ($e->getResponse()->getStatusCode() == '403')
	// 	{
	// 		$response = json_decode($e->getResponse()->getBody(true)->getContents());
	// 		return $response;
	// 	}
	// 	else
	// 	{
	// 		$response = json_decode($e->getResponse()->getBody(true)->getContents());
	// 		return $response;
	// 	}
	// }

    public function get_servers()
	{
		try
		{
			$url = self::API_URL . "/apps";
			$option = array('exceptions' => false);
			$header = array('Authorization'=>'Basic ' . $this->accessToken);
			$response = $this->client->get($url, array('headers' => $header));
			$result = json_decode($response->getBody()->getContents());
			return $result;
		}
		catch (RequestException $e)
		{
			//$response = $this->StatusCodeHandling($e);
			//return $response;
		}
	}
}

















?>
