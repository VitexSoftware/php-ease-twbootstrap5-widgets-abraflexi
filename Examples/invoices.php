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

$oPage = new \Ease\TWB5\WebPage();
\Ease\Shared::instanced()->loadConfig(\dirname(__DIR__).'/tests/.env');

$container = $oPage->addItem(new \Ease\TWB5\Container());
$container->addItem(new \Ease\Html\H1Tag('20 invoices'));

$invoiceRow = new \Ease\TWB5\Row();
$invoiceRow->addColumn(2, 'Abraflexi Code');
$invoiceRow->addColumn(2, 'Remote Number');
$invoiceRow->addColumn(2, 'Amount');
$invoiceRow->addColumn(2, 'Company');

$container->addItem($invoiceRow);

$invoice = new \AbraFlexi\FakturaVydana();

$invoices = $invoice->getColumnsFromAbraflexi([
    'id',
    'kod',
    'cisDosle',
    'sumCelkem',
    'nazFirmy'], ['storno' => false, 'limit' => 20]);

if (!empty($invoices)) {
    foreach ($invoices as $invoiceData) {
        $invoiceRow = new \Ease\TWB5\Row();
        $invoiceRow->addColumn(2, $invoiceData['kod']);
        $invoiceRow->addColumn(2, $invoiceData['cisDosle']);
        $invoiceRow->addColumn(2, $invoiceData['sumCelkem']);
        $invoiceRow->addColumn(2, $invoiceData['nazFirmy']);
        $container->addItem(new \Ease\Html\ATag(
            'embed.php?id='.$invoiceData['id'].'&evidence='.$invoice->getEvidence(),
            $invoiceRow,
        ));
    }
} else {
    $oPage->addItem(new \Ease\Html\H1Tag('No Invoices'));
}

$oPage->draw();
