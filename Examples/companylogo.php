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

$oPage = new \Ease\WebPage();
\Ease\Shared::instanced()->loadConfig(
    \dirname(__DIR__).'/tests/client.json',
    true,
);

$oPage->addItem(new \AbraFlexi\ui\CompanyLogo(['width' => '100']));

$oPage->draw();
