<?php

/**
 * AbraFlexi Bricks - Connection Config Form
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */

namespace AbraFlexi\ui\TWB5;

use Ease\TWB5\Form;
use Ease\Html\InputTextTag;

/**
 * Form to configure used AbraFlexi instance
 *
 * @author vitex
 */
class ConnectionForm extends Form {

    /**
     * AbraFlexi URL Input name
     * @var string eg. https://demo.abraflexi.eu:5434
     */
    public $urlField = 'url';

    /**
     * AbraFlexi User Input name
     * @var string eg. winstrom
     */
    public $usernameField = 'user';

    /**
     * AbraFlexi Password Input name
     * @var string eg. winstrom
     */
    public $passwordField = 'password';

    /**
     * AbraFlexi Company Input name
     * @var string eg. demo_s_r_o_
     */
    public $companyField = 'company';

    /**
     * AbraFlexi Server connection form
     * 
     * @param array $options           ConnectionOptions options
     * @param array $formProperties    FormTag properties eg. ['enctype' => 'multipart/form-data']
     * @param array $formDivProperties FormDiv propertise eg. ['class'=>'form-row align-items-center']
     * @param mixed $formContents      Any other initial content
     */
    public function __construct(array $options, array $formProperties = [], $formDivProperties = [], $formContents = null) {
        parent::__construct($formProperties, $formDivProperties, $formContents);

        $this->addInput(new InputTextTag($this->urlField),
                _('RestAPI endpoint url'));

        $this->addInput(new InputTextTag($this->usernameField),
                _('REST API Username'));

        $this->addInput(new InputTextTag($this->passwordField),
                _('Rest API Password'));

        $this->addInput(new InputTextTag($this->companyField),
                _('Company Code'));

        $this->fillUp($options);
    }
}
