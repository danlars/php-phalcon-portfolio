<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/3/15
 * Time: 10:15 PM
 */

namespace Portfolio\Backend\Forms;

use Phalcon\Forms\Form;
use phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class LoginForm extends Form{

    public function initialize(){

        $token = new Hidden($this->security->getTokenKey());
        $token->setAttributes(array(
            'value' => $this->security->getToken()
        ));
        $this->add($token);

        $Email = new Text("email");
        $Email->setLabel("E-mail");
        $Email->setFilters(array('striptags', 'string'));
        $Email->setAttributes(array(
            'placeholder' => 'contoso@mail.com',
            'value'       => 'example@example.com' //ERASE VALUE!!
        ));
        $Email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Email er påkrævet'
            )),
            new Email(array(
                'message' => 'Email er ikke gyldig'
            ))
        ));
        $this->add($Email);

        $password = new Password("password");
        $password->setLabel("Password");
        $password->setFilters(array('striptags', 'string'));
        $password->setAttributes(array(
            'placeholder' => 'password',
            'value'       => 'test' //ERASE VALUE!!!
        ));
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password påkrævet'
            ))
        ));
        $this->add($password);
    }
}