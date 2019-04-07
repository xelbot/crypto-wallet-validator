# crypto-wallet-validator

Library for validation of Ethereum, Bitcoin and other cryptocoin wallets

[![Build Status](https://travis-ci.com/xelbot/crypto-wallet-validator.svg?branch=master)](https://travis-ci.com/xelbot/crypto-wallet-validator)

## Installation

Use composer to install the package:

```bash
composer require xelbot/crypto-wallet-validator
```

Or just add the package to your `composer.json`

```json
{
    "require": {
        "xelbot/crypto-wallet-validator": "dev-master"
    }
}
```

### Usage

```php
<?php

use Xelbot\Crypto\WalletValidator;

WalletValidator::validate('0x8617E340B3D01FA5F11F306F4090FD50E238070D', 'ETH');
// return true

WalletValidator::validate('0xd1220A0CF4B9BE7A2E6BA89F429762E7B9ADB', 'ETH');
// return false
```

### Supported crypto currencies

* `'ETH'`, Ethereum
* `others` - coming soon :)
