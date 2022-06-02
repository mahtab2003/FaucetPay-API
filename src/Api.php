<?php
namespace Mahtab2003\FaucetPay;
use Mahtab2003\FaucetPay\Request\Request;

class Api
{
	protected $url = 'https://faucetpay.io/api/v1/';
	protected $key;
	protected $currency;

	function __construct($key, $currency = 'BTC')
	{
		$this->key = $key;
		$this->currency = $currency;
		$this->request = new Request($this->url);
	}

	function setCurrency($currency)
	{
		$this->currency = $currency;
	}

	function listCurrencies()
	{
		return $this->call('currencies', []);
	}

	function listFaucets()
	{
		return $this->call('faucetlist', []);
	}

	function getBalance()
	{
		return $this->call('getbalance', ['currency' => $this->currency]);
	}

	function checkAddress($address)
	{
		return $this->call('checkaddress', ['address' => $address, 'currency' => $this->currency]);
	}

	function getPayouts($count = 10)
	{
		return $this->call('payouts', ['currency' => $this->currency, 'count' => $count]);
	}

	function send($to, $amount, $referral = false)
	{
		return $this->call('send', ['amount' => $amount, 'to' => $to, 'currency' => $this->currency, 'referral' => $referral]);
	}

	private function call($method, $param = [])
	{
		$this->request->set_method($method);
		if(count($param) > 0)
		{
			foreach (array_keys($param) as $value) {
				$this->request->add_field($value, $param[$value]);
			}
		}
		$this->request->add_field('api_key', $this->key);
		return $this->request->run();
	}
}

?>