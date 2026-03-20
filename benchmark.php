<?php

require 'vendor/autoload.php';

use IsoCodes\VinNA;

$vins = [
    '1M8GDM9A_KP042788',
    '1M8GDM9A0KP042788',
    '1m8gdm9a0kp042788',
    '1M8GDM9AXKP042788',
    '5UXWX7C5*BA123456',
    '1HGCM82633A004352',
    'WAUZZZ8E03A000000',
    'JM1BL1HV3C1123456',
    '4USBR335_44123456',
    'JTDZV327_Y2123456',
];

$iterations = 100000;

$start = microtime(true);
for ($i = 0; $i < $iterations; $i++) {
    foreach ($vins as $vin) {
        VinNA::validate($vin);
    }
}
$end = microtime(true);

echo "Baseline: " . ($end - $start) . " seconds\n";
