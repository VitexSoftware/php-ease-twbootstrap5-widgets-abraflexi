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

namespace AbraFlexi\Bricks;

require_once \dirname(__DIR__).'/vendor/autoload.php';

$oPage = new \Ease\TWB5\WebPage(_('Abraflexi Custom Button Installer'));

$loginForm = new \AbraFlexi\ui\TWB5\ConnectionForm(['action' => 'install.php']);
// $loginForm->addInput(new \Ease\TWB5\Widgets\Toggle('browser',
//                isset($_REQUEST) && array_key_exists('browser', $_REQUEST), 'automatic',
//                ['onText' => _('Abraflexi WebView'), 'offText' => _('System Browser')]),
//        _('Open results in Abraflexi WebView or in System default browser'));
$loginForm->fillUp($_REQUEST);

$baseUrl = \dirname(\Ease\TWB5\WebPage::phpSelf()).'/index.php?authSessionId=${authSessionId}&companyUrl=${companyUrl}';

if ($oPage->isPosted()) {
    $browser = isset($_REQUEST) && \array_key_exists('browser', $_REQUEST) ? 'automatic' : 'desktop';

    $buttoner = new \AbraFlexi\RW(
        null,
        array_merge($_REQUEST, ['evidence' => 'custom-button']),
    );

    /* Modify Here: */
    $buttoner->insertToAbraflexi(['id' => 'code:BUTTON EXAMPLE CODE', 'url' => $baseUrl.'&custom=parameters..',
        'title' => _('Example Custom Action'), 'description' => _('Custom Button Description'),
        'location' => 'list', 'evidence' => 'faktura-vydana', 'browser' => $browser]);

    if ($buttoner->lastResponseCode === 201) {
        $oPage->addStatusMessage(_('Custom Button Established'), 'success');

        \define('ABRAFLEXI_COMPANY', $buttoner->getCompany());
    }
} else {
    $oPage->addStatusMessage(_('My App URL').': '.$baseUrl);
}

$setupRow = new \Ease\TWB5\Row();
$setupRow->addColumn(6, $loginForm);
$setupRow->addColumn(6, \Ease\TWB5\WebPage::singleton()->getStatusMessagesBlock());

$oPage->addItem(new \Ease\TWB5\Container($setupRow));

echo $oPage;
