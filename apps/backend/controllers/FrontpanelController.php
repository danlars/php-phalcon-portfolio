<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/29/15
 * Time: 4:58 PM
 */

namespace Portfolio\Backend\Controllers;

class FrontpanelController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle('Administration');
        parent::initialize();
    }

    public function indexAction(){

    }
}