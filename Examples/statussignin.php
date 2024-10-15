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

$oPage = new \Ease\TWB4\WebPage(_('Abraflexi connection probe'));

$connForm = new AbraFlexi\ui\ConnectionForm();
$connForm->fillUp($_REQUEST);

$container = $oPage->addItem(new \Ease\TWB4\Container($connForm));

$container->addItem(new \Ease\TWB4\Well(new \AbraFlexi\ui\StatusInfoBox(null, $_REQUEST)));

$container->addItem($oPage->getStatusMessagesAsHtml());

$oPage->draw();
