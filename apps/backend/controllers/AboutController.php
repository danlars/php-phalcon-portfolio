<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:16 PM
 */

namespace Portfolio\Backend\Controllers;


class AboutController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Om mig");
        parent::initialize();
    }

    public function indexAction(){

    }

}