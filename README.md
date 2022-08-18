
# Apirone Package

A Simple PHP Package to use the Apirone API. Easily Accept Payments With Crypto.

## Installation

Install my-project with npm

```bash
  cd my-project
  composer require mightybytesuk/apirone
```

## Usage
```bash
  $api = new apirone;
```
Create an account with Apirone
```bash
  $api->account();
```
Create a Address with callback to accept payments.
```bash
  $api->generateAddress($account, $currency, $callback, $id);
```
Check Address for payment
```bash
  $api->checkpayment($account, $currency, $address);
```

## Apirone Documentation

[Documentation](https://apirone.com/docs/)



    
