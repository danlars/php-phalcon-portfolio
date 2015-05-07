<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/14/15
 * Time: 8:27 PM
 */
namespace Portfolio\Frontend\Controllers;

use Portfolio\Models\Pages as Pages;

class IndexController extends ControllerBase{

    public function initialize()
    {
        $this->tag->setTitle('Index');
        parent::initialize();
    }

    public function IndexAction()
    {
        $query = Pages::query()
            ->columns(array('title', 'img', 'txt'))
            ->where("pageTitleID = 3")
            ->orderBy("pageID DESC")
            ->limit(8)
            ->execute();

        $this->view->Billeder = $query;
    }

}