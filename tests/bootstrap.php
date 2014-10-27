<?php

setlocale(LC_ALL, 'fr_FR');

$vendorDir = __DIR__ . '/../vendor';

if (!@include $vendorDir . '/autoload.php') {
        die("You must set up the project dependencies, run the following commands:
            wget http://getcomposer.org/composer.phar
            php composer.phar install
            ");
}

$loader = include $vendorDir .  '/autoload.php';
$loader->add('IsoCodes\\Tests', __DIR__);
