IsoCodes
--------

PHP libray providing various ISO codes validators

* International : IBAN, SWIFT/BIC, BBAN (RIB), Credit Card number, EAN13
* European : various VAT number formats
* France : Numéro de Sécurité Sociale / INSEE, SIREN, SIRET, Codes postaux, Clef Type 1/2 Norme B2
* US : Social Security number
* UK : National Insurance Number
* Belgian structured communication ("communication structurée")
* Spain: NIF, NIE (Número de Identificación Fiscal/Extranjero) & CIF (Código de identificación fiscal)
* Zipcode for many countries: US, Canada, France, Netherlands, etc.

Each code has its own validator.
Each validator is illustrated by a unit test case.

IsoCodes is PHP 5.3 to 5.6 compatible & supports hhvm.


Build status
------------

[![License](https://poser.pugx.org/ronanguilloux/isocodes/license.svg)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Latest Stable Version](https://poser.pugx.org/ronanguilloux/isocodes/v/stable.svg)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Latest Unstable Version](https://poser.pugx.org/ronanguilloux/isocodes/v/unstable.svg)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Build Status](https://secure.travis-ci.org/ronanguilloux/IsoCodes.png?branch=master)](http://travis-ci.org/ronanguilloux/IsoCodes)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/badges/quality-score.png?s=db3d0ec70de304f743065f3b628c809c4a48d46f)](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/fde42adb-344d-4055-b78d-20b598040ac8/mini.png)](https://insight.sensiolabs.com/projects/fde42adb-344d-4055-b78d-20b598040ac8)

[![Total Downloads](https://poser.pugx.org/ronanguilloux/isocodes/downloads.svg)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Monthly Downloads](https://poser.pugx.org/ronanguilloux/isocodes/d/monthly.png)](https://packagist.org/packages/ronanguilloux/isocodes)
[![Daily Downloads](https://poser.pugx.org/ronanguilloux/isocodes/d/daily.png)](https://packagist.org/packages/ronanguilloux/isocodes)


Continously inspecting results (phpdoc, phpmd, phpcc, etc.) available on [Scrutinizer CI](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/inspections)


Usage
-----

```php
    // Is this bank account number ok?
    $isSwiftBic = SwiftBic::validate( 'CEDELULLXXX' );

    // Will my letter reach the Labrador Islands ?
    $isCanadian = ZipCode::validate( 'A0A 1A0', 'Canada');

    // Worldwide money transfer, anyone ?
    $isBankable = CreditCard::validate( '12345679123456' );

    // Paying your taxes in Madrid?
    $isTaxableInSpain = Nif::validate('A999999L');
    
    // Does this book just exists?
    $isPublished = Isbn10::validate('2-2110-4199-X') 
```


Installing via GitHub
---------------------

```bash
    $ git clone git@github.com:ronanguilloux/IsoCodes.git
```

Autoloading is PSR-0 friendly.

Installing via [Packagist](https://packagist.org/packages/ronanguilloux/isocodes) & [Composer](http://getcomposer.org/doc/00-intro.md)
-----------------------------------

Create a composer.json file:

```json
    {
        "require": {"ronanguilloux/isocodes": "dev-master"}
    }
```

Grab composer:

```bash
    $ curl -s http://getcomposer.org/installer | php
```

Run install (will build the autoload):

```bash
    $ php composer.phar install
```


Unit testing
------------

```bash
    $ phpunit --testdox --coverage-text
```


Make utilities
--------------

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
	To run a simple continuous tests server:	mak continuous
	To dry-fix code style issues:			    make dry-fix
	To evaluate code quality stats:			    make stats
	To update vendors using Composer:		    make update
```

Quality assurance report
------------------------

Isocodes quality plan is mainly based on phpunit: it runs +/- 750 tests & assertions,
with separated valid & invalid entries sets.
Tests values are mainly real data or documented examples
from standards documentation, and a few handmade values.

The `composer.json` already includes these  [Php Quality Assurance Toolchain](http://phpqatools.org) libraries:

* [phploc](https://github.com/sebastianbergmann/phploc)
* [phpmd](https://github.com/phpmd/phpmd)
* [phpcpd](https://github.com/sebastianbergmann/phpcpd)
* [pdepend](https://github.com/pdepend/pdepend)
* [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer)

Just run:

```bash
    $ make stats -i
```

XML report outputs are then generated in a new `./build` folder

License Information
-------------------

* GNU GPL v3
* You can find a copy of this software here: https://github.com/ronanguilloux/IsoCodes


Contributing Code
-----------------

The issue queue can be found at: https://github.com/ronanguilloux/IsoCodes/issues
All contributors will be fully credited. Just sign up for a github account, create a fork and hack away at the codebase.
Submit patches to: ronan.guilloux@gmail.com
Even one-off contributors will be fully credited (& probably blessed through three generations).


Special thanks
--------------

Many thanks to [IntelliJ/JetBrains/PhpStorm](http://www.jetbrains.com/phpstorm/) for having sponsored the IsoCode library development!
Any contributor having an accepted PR may receive an Open Source License Key for [PhpStorm IDE](http://www.jetbrains.com/phpstorm/download/).
Just ping [Ronan Guilloux via email](mailto:ronan.guilloux@gmail.com) to get one.


TODO
----

* Various iso codes listed in http://www.credit-card.be/BankAccount/ValidationRules.htm
* ISBN13
* Add UK PostCode, UK Tax Code (http://www.braemoor.co.uk/software/vat.shtml)
* US phone number : /^(\+\d)*\s*(\(\d{3}\)\s*)*\d{3}(-{0,1}|\s{0,1})\d{2}(-{0,1}|\s{0,1})\d{2}$/
