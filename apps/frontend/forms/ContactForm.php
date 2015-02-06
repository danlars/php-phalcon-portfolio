<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/15
 * Time: 7:31 PM
 */
namespace Portfolio\Frontend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class ContactForm extends Form{

    public function initialize(){
        $FullName = new Text("fullname");
        $FullName->setLabel("* Navn");
        $FullName->setFilters(array('striptags', 'string'));
        $FullName->setAttribute('placeholder', 'etc. Karl Johansson');
        $FullName->addValidators(array(
            new PresenceOf(array(
                'message' => 'Navn er påkrævet'
            ))
        ));
        $this->add($FullName);

        $Email = new Text("email");
        $Email->setLabel("* E-mail");
        $Email->setFilters(array('striptags', 'string'));
        $Email->setAttribute('placeholder', 'contoso@mail.com');
        $Email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Email er påkrævet'
            )),
            new Email(array(
                'message' => 'Email er ikke gyldig'
            ))
        ));
        $this->add($Email);

        $tlf = new Text("tlf");
        $tlf->setLabel("Telefon");
        $tlf->setFilters(array('striptags', 'string'));
        $tlf->setAttribute('placeholder', '88 88 88 88');
        $this->add($tlf);

        $title = new Text("title");
        $title->setLabel("* Overskrift");
        $title->setFilters(array('striptags', 'string'));
        $title->setAttribute('placeholder', 'Titel på indlæg');
        $title->addValidators(array(
            new PresenceOf(array(
                'message' => 'Overskrift på dit indlæg er påkrævet'
            ))
        ));
        $this->add($title);

        $txt = new TextArea("txt");
        $txt->setLabel("* Beskrivelse");
        $txt->setFilters(array('striptags', 'string'));
        $txt->setAttributes(array(
            'placeholder' => 'Beskrivelse af dit indlæg',
            'rows' => '6'
        ));
        $txt->addValidators(array(
            new PresenceOf(array(
                'message' => 'Beskrivelse er påkrævet'
            ))
        ));
        $this->add($txt);
    }
}