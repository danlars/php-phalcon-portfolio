<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:17 PM
 */

namespace Portfolio\Backend\Controllers;


class ContactController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Feedback");
        parent::initialize();
    }

    public function indexAction(){

    }

}