<?php 
namespace Mahtab2003\FaucetPay\Request;
use Mahtab2003\FaucetPay\Response\Response;

class Request
{
	protected $url;
	protected $method;
	protected $param = [];

	function __construct($url)
	{
		$this->url = $url;
	}

	function set_method($method)
	{
		$this->method = $method;
	}

	function add_field($index, $value)
	{
		$this->param[$index] = $value;
	}

	function run()
	{
		$endpoint = $this->url.$this->method;
		$param = http_build_query($this->param);

		$ch = curl_init($endpoint);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		$page_info = curl_getinfo($ch);
		$code = $page_info['http_code'];
		if($code == 200)
		{
			return new Response($result);
		}
		return new Response(json_encode(['status' => 0, 'message' => 'Connection Failed']));
	}
}

?>