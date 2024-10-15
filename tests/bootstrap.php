<?php

declare(strict_types=1);

/**
 * This file is part of the MultiFlexi package
 *
 * https://github.com/VitexSoftware/php-ease-twbootstrap5-widgets-abraflexi
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (file_exists('../vendor/autoload.php')) {
    require_once '../vendor/autoload.php'; // Test Run
} else {
    require_once 'vendor/autoload.php'; // Create Test
}

\Ease\Shared::instanced()->loadConfig('tests/.env', true);
\define('EASE_LOGGER', 'syslog');
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
