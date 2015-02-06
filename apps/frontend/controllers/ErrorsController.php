<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/28/15
 * Time: 12:32 PM
 */

namespace Portfolio\Frontend\Controllers;


class ErrorsController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Whoops!");
        parent::initialize();
    }

    public function p401Action(){

    }

    public function p404Action(){

    }

    public function p500Action(){

    }
}