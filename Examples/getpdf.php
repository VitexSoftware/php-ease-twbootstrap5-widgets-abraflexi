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
\Ease\Shared::instanced()->loadConfig(\dirname(__DIR__).'/tests/client.json', true);

$embed = $oPage->getRequestValue('embed');
$id = $oPage->getRequestValue('id');
$evidence = $oPage->getRequestValue('evidence');
$lang = $oPage->getRequestValue('lang');

$document = new \AbraFlexi\RO(
    is_numeric($id) ? (int) $id : $id,
    ['evidence' => $evidence],
);

if (null !== $document->getMyKey()) {
    $documentBody = $document->getInFormat('pdf', null, empty($lang) ? 'en' : $lang);

    if ($embed !== 'true') {
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.$document->getEvidence().'_'.$document.'.pdf');
        header('Content-Type: application/octet-stream');
        header('Content-Transfer-Encoding: binary');
    } else {
        header('Content-Type: application/pdf');
    }

    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: '.\strlen($documentBody));
    echo $documentBody;
} else {
    exit(_('Wrong call'));
}
