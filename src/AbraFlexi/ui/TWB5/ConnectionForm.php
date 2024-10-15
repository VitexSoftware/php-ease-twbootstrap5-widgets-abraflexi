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

use Ease\Html\InputTextTag;
use Ease\TWB5\Form;

/**
 * Form to configure used AbraFlexi instance.
 *
 * @author vitex
 */
class ConnectionForm extends Form
{
    /**
     * AbraFlexi URL Input name.
     *
     * @var string eg. https://demo.abraflexi.eu:5434
     */
    public string $urlField = 'url';

    /**
     * AbraFlexi User Input name.
     *
     * @var string eg. winstrom
     */
    public string $usernameField = 'user';

    /**
     * AbraFlexi Password Input name.
     *
     * @var string eg. winstrom
     */
    public string $passwordField = 'password';

    /**
     * AbraFlexi Company Input name.
     *
     * @var string eg. demo_s_r_o_
     */
    public string $companyField = 'company';

    /**
     * AbraFlexi Server connection form.
     *
     * @param array $options           ConnectionOptions options
     * @param array $formProperties    FormTag properties eg. ['enctype' => 'multipart/form-data']
     * @param array $formDivProperties FormDiv propertise eg. ['class'=>'form-row align-items-center']
     * @param mixed $formContents      Any other initial content
     */
    public function __construct(array $options, array $formProperties = [], $formDivProperties = [], $formContents = null)
    {
        parent::__construct($formProperties, $formDivProperties, $formContents);

        $this->addInput(
            new InputTextTag($this->urlField),
            _('RestAPI endpoint url'),
        );

        $this->addInput(
            new InputTextTag($this->usernameField),
            _('REST API Username'),
        );

        $this->addInput(
            new InputTextTag($this->passwordField),
            _('Rest API Password'),
        );

        $this->addInput(
            new InputTextTag($this->companyField),
            _('Company Code'),
        );

        $this->fillUp($options);
    }
}
