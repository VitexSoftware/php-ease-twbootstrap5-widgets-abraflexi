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
 * Description of AddressForm.
 *
 * @author vitex
 */
class AdresarForm extends \Ease\TWB5\Form
{
    /**
     * Address Object holder.
     */
    public \AbraFlexi\Adresar $address = null;

    /**
     * Address Book item form.
     *
     * @param \AbraFlexi\Adresar $address
     */
    public function __construct($address)
    {
        $addressID = $address->getMyKey();
        $this->address = $address;
        parent::__construct(['name' => 'address'.$addressID]);

        $this->addInput(new \Ease\Html\InputTag(
            'kod',
            $address->getDataValue('kod'),
        ), _('Code'));
        $this->addInput(new \Ease\Html\InputTag(
            'nazev',
            $address->getDataValue('nazev'),
        ), _('Name'));

        if ($address->getDataValue('email') === '') {
            $address->addStatusMessage(_('Email address is empty'), 'warning');
        }

        $this->addInput(new \Ease\Html\InputTag(
            'email',
            $address->getDataValue('email'),
        ), _('Email'));

        $this->addInput(new \Ease\Html\TextareaTag(
            'poznam',
            $address->getDataValue('poznam'),
        ), _('Note'));

        $this->addItem(new \Ease\Html\InputHiddenTag(
            'class',
            \get_class($address),
        ));
        //        $this->addItem(new \Ease\Html\InputHiddenTag('enquiry_id', $address->getDataValue('enquiry_id')));

        if (null !== $addressID) {
            $this->addItem(new \Ease\Html\InputHiddenTag(
                $address->keyColumn,
                $addressID,
            ));
        }
    }
}
