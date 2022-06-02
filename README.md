# FaucetPay API
An API Wrapper to Interact with [FaucetPay](https://faucetpay.io).

## Installation

This package is best installed through Composer:

```bash
composer require mahtab2003/faucetpay
```

## Usage
Before you can get started, you need to get the API Key from FaucetPay. Login to the [FaucetPay](https://faucetpay.io), go to Faucet Owner Dashboard -> `Your Faucet` -> Reveal API Key. Use this API key to interact with FaucetPay.

The FaucetPay API exposes the following methods. The available parameters are listed below.
- listCurrencies: Get the list of all supported currencies.
- listFaucets: Get the list of all available faucets.
- getBalance: Get the balance of the faucet.
- checkAddress: Check if the address is linked to any FaucetPay account.
- getPayouts: Get the list of all recent faucets.
- send: Send funds to another FaucetPay account.

### Example

```php
use \Mahtab2003\FaucetPay\Api;

// Create a new Api class instance.
$api = new Api('API Key', 'BTC');

// Get the balance of the faucet.
$response = $api->getBalance();

// Check whether the request was successful.
if ($response->isSuccessful()) {
   $data = $response->getData();
   echo 'Your faucet balance is: ' . $data['balance'];
} else {
   echo 'Error: ' . $response->getMessage();
}
```

## License

©️ Copyright 2022 NXTS Developer. Code released under the MPL-2.0 License.