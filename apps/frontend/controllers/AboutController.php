<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/15
 * Time: 9:03 AM
 */
namespace Portfolio\Frontend\Controllers;

class AboutController extends ControllerBase{

    public function initialize()
    {
        $this->tag->setTitle('Om mig');
        parent::initialize();
    }

    public function IndexAction()
    {
    }

}