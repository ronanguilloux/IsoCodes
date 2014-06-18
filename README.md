IsoCodes
--------

PHP libray providing various ISO codes validators

* International : IBAN, SWIFT/BIC, BBAN (RIB), Credit Card number, EAN13
* European : various VAT number formats
* France : Numéro de Sécurité Sociale / INSEE, SIREN, SIRET, Codes postaux, Clef Type 1/2 Norme B2
* US : Social Security number
* UK : National Insurance Number
* Zipcode for many countries: US, Canada, France, etc.

Each code has its own validator.
Each validator is illustrated by a unit test case.


Build status
------------

[![Latest Stable Version](https://poser.pugx.org/ronanguilloux/IsoCodes/v/stable.png)](https://packagist.org/packages/ronanguilloux/IsoCodes) [![Build Status](https://secure.travis-ci.org/ronanguilloux/IsoCodes.png?branch=master)](http://travis-ci.org/ronanguilloux/IsoCodes) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/badges/quality-score.png?s=db3d0ec70de304f743065f3b628c809c4a48d46f)](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/) [![Total Downloads](https://poser.pugx.org/ronanguilloux/IsoCodes/downloads.png)](https://packagist.org/packages/ronanguilloux/IsoCodes)


Continously inspecting results (phpdoc, phpmd, phpcc, etc.) available on [Scrutinizer CI](https://scrutinizer-ci.com/g/ronanguilloux/IsoCodes/inspections)


Usage
-----

``` php
    // Is this bank account number ok?
    $isSwiftBic = SwiftBic::validate( 'CEDELULLXXX' );

    // Will my letter reach the Labrador Islands ?
    $isCanadian = ZipCode::validate( 'A0A 1A0', 'Canada');

    // Money, anyone ?
    $isBankable = CreditCard::validate( '12345679123456' );
```


Installing via GitHub
---------------------

``` bash
    $ git clone git@github.com:ronanguilloux/IsoCodes.git
```

Autoloading is PSR-0 friendly.

Installing via [Packagist](https://packagist.org/packages/ronanguilloux/isocodes) & [Composer](http://getcomposer.org/doc/00-intro.md)
-----------------------------------

Create a composer.json file:

``` json
    {
        "require": {"ronanguilloux/isocodes": "dev-master"}
    }
```


Grab composer:

``` bash
    $ curl -s http://getcomposer.org/installer | php
```

Run install (will build the autoload):

``` bash
    $ php composer.phar install
```


Testing
-------

``` bash
    $ phpunit --coverage-text
```


Quality assurance report
------------------------

Have a look at [Php Quality Assurance Toolchain](http://phpqatools.org), then install:
* [phploc](https://github.com/sebastianbergmann/phploc)
* [phpmd](https://github.com/phpmd/phpmd)
* [phpcpd](https://github.com/sebastianbergmann/phpcpd)
* [pdepend](https://github.com/pdepend/pdepend)
* [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer)

Then run:

``` bash
    $ phploc src/ > STATS
    $ phpmd src/ text codesize,unusedcode,naming >> STATS
    $ phpcpd src/ >> STATS
    $ pdepend src/ >> STATS
    $ php-cs-fixer fix src/ --dry-run >> STATS
```

Manual checks & xml-based output:

``` bash
    $ mkdir -p build/logs
    $ phpcs --report=checkstyle --report-file=build/logs/checkstyle.xml --standard=Symfony2 --ignore=*.html.php,*.config.php,*.twig.php src
    $ phpmd src xml codesize,unusedcode,naming --reportfile build/logs/pmd.xml

```

This set of php QA tools are currently run on this sources, via a git's pre-commit hook: See STATS file for the actual report.


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


TODO
----

* Various iso codes listed in http://www.credit-card.be/BankAccount/ValidationRules.htm
* ISBN
* Add UK PostCode, UK Tax Code (http://www.braemoor.co.uk/software/vat.shtml)
* US phone number : /^(\+\d)*\s*(\(\d{3}\)\s*)*\d{3}(-{0,1}|\s{0,1})\d{2}(-{0,1}|\s{0,1})\d{2}$/
