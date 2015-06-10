<?php

namespace Portfolio\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;

class Feedback extends \Phalcon\Mvc\Model
{

    // @var integer
    public $id;

    //@var string
    public $fullname;

    //@var string
    public $email;

    // @var integer
    public $tlf;

    //@var string
    public $title;

    // @var string
    public $txt;

    // @var string
    public $dato;

    // @var string
    public $status;

    // @var string
    public $deletedato;

    //convert string to date
    public function afterFetch(){
        $this->dato = date('d-m-Y H:i', strtotime($this->dato));
    }

    // Validations and business logic
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
    }

}
