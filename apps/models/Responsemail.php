<?php

namespace Portfolio\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;

class Responsemail extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $fullname;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $txt;

    /**
     *
     * @var string
     */
    public $dato;

    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
        return true;
    }

}
