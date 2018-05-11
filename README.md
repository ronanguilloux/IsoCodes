# IsoCodes

PHP library - Validators for standards from ISO, International Finance, Public Administrations, GS1, Book Industry, Phone numbers & Zipcodes for many countries

## Usage

```php
// Sending letters to the Labrador Islands ?
$isCanadian = ZipCode::validate('A0A 1A0', 'CA');

// Checking out your e-commerce shopping cart?
$isBankable = CreditCard::validate('12345679123456');

// Transferring money worldwide?
$isSwiftBic = SwiftBic::validate('CEDELULLXXX');

// Paying your taxes in Madrid?
$isTaxableInSpain = Nif::validate('A999999L');

// Receiving containers from Port of Shanghai?
$isShippingContainerCode = Sscc::validate('806141411234567896');

// Publishing books?
$isPublished = Isbn::validate('2-2110-4199-X')

// Trading items with GTIN barcodes in GS1 system? 
$isBarcode = Ean13::validate('4719512002889')

// Calling phone numbers in Palo Alto?
$isPhonable = PhoneNumber::validate('+1-650-798-2800', 'US')

// Buying Apple stocks?
$isISIN = Isin::validate('US0378331005'); // Apple Inc. (AAPL)
```


## ISO Codes Validations available:

### International Finance

* IBAN (requires `bcmath` PHP extension)
* SWIFT/BIC
* BBAN (RIB, requires `bcmath` PHP extension)
* Credit Card number
* SEDOL (Stock Exchange codes)

### Book / Music Industries

* ISBN - International Standard Book Number, both 10 & 13 digits
* ISMN - International Standard Music Number 
* ISWC - International Standard Musical Work Code

### Public Administrations

* ISIN - International Securities Identification Number
* European VAT / tax system: various VAT number formats
* France: Numéro de Sécurité Sociale / INSEE, SIREN, SIRET, Codes postaux, Clef Type 1/2 Norme B2
* US: Social Security number
* UK: National Insurance Number (NINO)
* Belgium: Structured Ccommunication ("communication structurée")
* Spain: NIF, NIE (Número de Identificación Fiscal/Extranjero) & CIF (Código de identificación fiscal)
* Netherlands: Burgerservicenummer / Citizen Service Number (BSN)
* Finland: HETU, Henkilötunnus (Finnish personal identity code)

### GS1 specific numbers/identifiers

* GTIN - Global Trade Item Number: GTIN-8, GTIN-12, GTIN-13, GTIN-14
* GLN - Global Location Number
* SSCC - Serial Shipping Container Code
* GRAI - Global Returnable Asset Identifier
* GSRN - Global Service Relation Number
* GDTI - Global Document Type Identifier
* UDI - Unique Device Identification (the GTIN part of it)
* Older/deprecated identifiers, now in GTIN: EAN-8, EAN-13, UCC-13, UPC-A, DUN-14, ITF-14

### Miscellaneous

* ZIP code validators for 175+ countries
* Phone number validation for all countries/regions of the world

Each code has its own validator.
Each validator is illustrated by a unit test case.

IsoCodes is compatible with all versions of PHP that are [actively supported](http://php.net/supported-versions.php) by the PHP project, plus hhvm.


## Build status


[![License](https://poser.pugx.org/ronanguilloux/isocodes/license.svg)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Latest Stable Version](https://poser.pugx.org/ronanguilloux/isocodes/v/stable.svg)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Latest Unstable Version](https://poser.pugx.org/ronanguilloux/isocodes/v/unstable.svg)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Build Status](https://secure.travis-ci.org/ronanguilloux/IsoCodes.png?branch=master)](http://travis-ci.org/ronanguilloux/IsoCodes)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/fde42adb-344d-4055-b78d-20b598040ac8/mini.png)](https://insight.sensiolabs.com/projects/fde42adb-344d-4055-b78d-20b598040ac8)
[![Coverage Status](https://coveralls.io/repos/ronanguilloux/IsoCodes/badge.svg?branch=master)](https://coveralls.io/r/ronanguilloux/IsoCodes?branch=master)
[![Total Downloads](https://poser.pugx.org/ronanguilloux/isocodes/downloads)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Monthly Downloads](https://poser.pugx.org/ronanguilloux/isocodes/d/monthly.png)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Daily Downloads](https://poser.pugx.org/ronanguilloux/isocodes/d/daily.png)](https://packagist.org/packages/ronanguilloux/isocodes)


Continously inspecting results (phpdoc, phpmd, phpcc, etc.) available on [Scrutinizer CI](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/inspections)


## bcmath as an optional extension for certain validators

For IBAN & BBAN ISO-codes, PHP is required to be compiled with "--enable-bcmath" for arbitrary precision mathematic checks.
Usually, you already have `bcmath` bundled in your PHP version, since many common PHP packages (`php-cli`, `php-fpm`, `php5-cgi`, `libapache2-mod-php5`, etc.) in stable GNU/Linux distribution releases (such as Debian) are listed as having `bcmath` built in to them, as an included module.


## Installing

### Via GitHub

```bash
$ git clone git@github.com:ronanguilloux/IsoCodes.git
```

Autoloading is PSR-0 friendly.

### Via [Packagist](https://packagist.org/packages/ronanguilloux/isocodes) & [Composer](https://getcomposer.org/doc/00-intro.md)

Require the latest version of `ronanguilloux/isocodes` with Composer

```bash
$ composer require ronanguilloux/isocodes
```

## Wrappers

### With Symfony Validator

Install [Soullivaneuh/IsoCodesValidator](https://github.com/Soullivaneuh/IsoCodesValidator)
to get IsoCodes working as Validator for **Symfony** and **Silex**.

### With CakePHP 3

Install [gourmet/validation](https://github.com/gourmet/validation)
to get IsoCodes working with **CakePHP 3** as a validator.

### With Laravel

Install [pixelpeter/laravel5-isocodes-validation](https://github.com/pixelpeter/laravel5-isocodes-validation)
to get IsoCodes working with **Laravel 5** as a validator.

## Unit testing

```bash
$ phpunit --testdox --coverage-text
```


## Make utilities

For development & contribution purpose only,
a Makefile provides various tools to check your code style, quality & test coverage:

```
Usual tasks:

	To initialize vendors:  make
	To check code quality:	make quality
	To run tests suite:	    make tests
	To fix code style:	    make cs-fix

Other specific tasks:

	To evaluate code coverage:			        make codecoverage
	To run a simple continuous tests server:	make continuous
	To dry-fix code style issues:			    make dry-fix
	To evaluate code quality stats:			    make stats
	To update vendors using Composer:		    make update
```


## Quality assurance report

Isocodes quality plan is mainly based on phpunit: it runs 980+ unit tests,
with separated valid & invalid entry sets.
Test values are mainly real data or documented examples from standard documentation, and a few handmade values.

The `composer.json` already includes these  [Php Quality Assurance Toolchain](https://phpqa.io/) libraries:

* [phploc](https://github.com/sebastianbergmann/phploc)
* [phpmd](https://github.com/phpmd/phpmd)
* [phpcpd](https://github.com/sebastianbergmann/phpcpd)
* [pdepend](https://github.com/pdepend/pdepend)
* [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)

Just run:

```bash
$ make stats -i
```

XML report outputs are then generated in a new `./build` folder

Code covering report built using [Coveralls.io](https://coveralls.io/r/ronanguilloux/IsoCodes).
[How-to generate such code coverage report using PHPUnit](https://github.com/satooshi/php-coveralls/blob/master/README.md).


## License Information

* GNU GPL v3
* You can find a copy of this software here: https://github.com/ronanguilloux/IsoCodes


## Contributing Code

The issue queue can be found at: https://github.com/ronanguilloux/IsoCodes/issues. 
See [CONTRIBUTING.md](CONTRIBUTING.md).


## Special thanks

[Contributors list](https://github.com/ronanguilloux/IsoCodes/graphs/contributors): Many thanks to all!

Many thanks to [JetBrains PhpStorm](http://www.jetbrains.com/phpstorm/) for having sponsored the IsoCode library development from the very beginning!
