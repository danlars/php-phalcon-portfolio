<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:18 PM
 */

namespace Portfolio\Backend\Controllers;


class TasksController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Opgaver");
        parent::initialize();
    }

    public function indexAction(){

    }
}