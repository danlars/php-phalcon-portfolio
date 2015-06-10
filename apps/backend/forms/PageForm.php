<?php

namespace Portfolio\Backend\Forms;

use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class PageForm extends Form{

    public function initialize(){

        $Title = new Text("title");
        $Title->setLabel("Overskrift");
        $Title->setFilters(array('striptags', 'string'));
        $Title->setAttributes(array(
            'placeholder' => 'Eks: Min side'
        ));
        $Title->addValidators(array(
            new PresenceOf(array(
                'message' => 'Titel må ikke være tom'
            ))
        ));


        $Text = new TextArea("txt");
        $Text->setLabel("Beskrivelse");
        $Text->setFilters(array('striptags', 'string'));
        $Text->setAttributes(array(
            'placeholder'   => 'Eks: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy. Proin mollis lorem non dolor...',
            'rows'          => '8'
        ));


        $File = new File("img");
        $File->setLabel("Billede");

        $this->add($File);
        $this->add($Title);
        $this->add($Text);
    }
}