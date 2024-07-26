<?php
/**
 * AbraFlexi-Bricks - Unit Test bootstrap
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright (c) 2020, Vítězslav Dvořák
 */
if (file_exists('../vendor/autoload.php')) {
    require_once '../vendor/autoload.php'; //Test Run
} else {
    require_once 'vendor/autoload.php'; //Create Test
}
\Ease\Shared::instanced()->loadConfig('tests/.env',true);
define('EASE_LOGGER', 'syslog');
/*
$banka = 'HLAVNI';

$prober = new AbraFlexi\RW();
$prober->setEvidence('bankovni-ucet');
if (!$prober->recordExists(['kod' => $banka])) {
    $prober->insertToAbraflexi(['kod' => $banka,
        'nazev' => $banka
    ]);
}

$labeler = new AbraFlexi\Stitek();
$labeler->createNew('CHYBIFAKTURA', ['banka']);
$labeler->createNew('NEIDENTIFIKOVANO', ['banka']);
*/