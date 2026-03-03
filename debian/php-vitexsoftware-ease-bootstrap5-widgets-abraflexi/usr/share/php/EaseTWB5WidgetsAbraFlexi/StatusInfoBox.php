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

namespace AbraFlexi\ui\TWB5;

/**
 * AbraFlexi connection status widget.
 */
class StatusInfoBox extends \AbraFlexi\Company implements \Ease\Embedable
{
    use \Ease\Glue;

    /**
     * AbraFlexi Status.
     */
    public array $info = [];

    /**
     * Try to connect to AbraFlexi.
     *
     * @param array|string $init       company dbNazev or initial data
     * @param mixed        $properites
     */
    public function __construct($init = null, $properites = [])
    {
        parent::__construct($init, $properites);
        $infoRaw = $this->getFlexiData();

        if (\count($infoRaw) && !\array_key_exists('success', $infoRaw)) {
            $this->info = \Ease\Functions::reindexArrayBy($infoRaw, 'dbNazev');
        }
    }

    /**
     * Is Configured company connected ?
     *
     * @return bool
     */
    public function connected()
    {
        return \array_key_exists($this->getCompany(), $this->info);
    }

    /**
     * Draw result.
     */
    public function draw(): void
    {
        if ($this->connected()) {
            $myCompany = $this->getCompany();
            $return = new \Ease\TWB5\LinkButton(
                $this->url.'/c/'.$myCompany,
                $this->info[$myCompany]['nazev'],
                'success',
            );
        } else {
            $return = new \Ease\TWB5\LinkButton(
                $this->getApiURL(),
                _('Connection Problem'),
                'danger',
            );
        }

        $return->draw();
    }
}
