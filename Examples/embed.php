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

require_once '../vendor/autoload.php';
\Ease\Shared::instanced()->loadConfig(
    \dirname(__DIR__).'/tests/client.json',
    true,
);

$oPage = new \Ease\TWB4\WebPage();

$id = $oPage->getRequestValue('id');
$evidence = $oPage->getRequestValue('evidence');

$document = new \AbraFlexi\RO(
    is_numeric($id) ? (int) $id : $id,
    ['evidence' => $evidence, 'detail' => 'summary'],
);

$oPage->setPageTitle($document->getEvidence().' '.$document);

$feeder = 'getpdf.php?lang=en'; // Override choosen language here

$embed = new \AbraFlexi\ui\EmbedResponsivePDF($document, $feeder, 'default');

$oPage->addItem(new \Ease\TWB4\Container($embed));
$oPage->draw();
