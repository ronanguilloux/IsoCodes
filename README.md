IsoCodes
--------

PHP libray providing various ISO codes validators

* International : IBAN, SWIFT/BIC, BBAN (RIB), Credit Card number, EAN13
* France : Numéro de Sécurité Sociale / INSEE, SIREN, SIRET, Codes postaux
* US : Social Security number
* UK : National Insurance Number
* Zipcode for many countries: US, Canada, France, etc.

Each code has its own validator.
Each validator is illustrated by a unit test case.


Build status
------------

[![Build Status](https://secure.travis-ci.org/ronanguilloux/IsoCodes.png?branch=master)](http://travis-ci.org/ronanguilloux/IsoCodes)


Usage
-----

    // Will this financial transaction succeed ?
    $isSwiftBic = SwiftBic::validate( 'CEDELULLXXX' );

    // Will my letter reach the Labrador islands ?
    $isCanadianZipCode = ZipCode::validate( 'A0A 1A0', 'Canada');

    // American Express, anyone ?
    $isAmericanExpress = CreditCard::validate( '12345679123456' );


Installing via GitHub
---------------------

    $ git clone git@github.com:ronanguilloux/IsoCodes.git

Autoloading is PSR-0 friendly.

Installing via [Packagist](https://packagist.org/packages/ronanguilloux/isocodes) & [Composer](http://getcomposer.org/doc/00-intro.md)
-----------------------------------

Create a composer.json file:

    {
        "require": {"ronanguilloux/isocodes": "dev-master"}
    }


Grab composer:

    $ curl -s http://getcomposer.org/installer | php

Run install (will build the autoload):

    $ php composer.phar install


Testing
-------

    $ phpunit --coverage-text


Quality assurance report
------------------------

Have a look at [Php Quality Assurance Toolchain](http://phpqatools.org), then install:
* [phploc](https://github.com/sebastianbergmann/phploc)
* [phpmd](https://github.com/phpmd/phpmd)
* [phpcpd](https://github.com/sebastianbergmann/phpcpd)
* [pdepend](https://github.com/pdepend/pdepend)
* [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer)

Then run:

    phploc src/ > STATS
    phpmd src/ text codesize,unusedcode,naming >> STATS
    phpcpd src/ >> STATS
    pdepend src/ >> STATS
    php-cs-fixer fix src/ --dry-run >> STATS

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

