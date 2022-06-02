<?php 
namespace Mahtab2003\FaucetPay\Response;

class Response
{
	protected $success = false;
	protected $message = '';
	protected $data = [];

	function __construct($result)
	{
		$data = json_decode($result, true);
		if($data['status'] == 200)
		{
			$this->success = true;
		}
		else
		{
			$this->success = false;
		}
		$this->message = $data['message'];
		unset($data['status']);
		unset($data['message']);
		$this->data = $data;
	}

	function getMessage()
	{
		return $this->message;
	}

	function isSuccessful()
	{
		return $this->success;
	}

	function getData()
	{
		return $this->data;
	}
}

?>