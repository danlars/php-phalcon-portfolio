<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/14/15
 * Time: 8:27 PM
 */
namespace Portfolio\Frontend\Controllers;

use Portfolio\Models\News as News;

class IndexController extends ControllerBase{

    public function initialize()
    {
        $this->tag->setTitle('Index');
        parent::initialize();
    }

    public function IndexAction()
    {
        $query = News::query()
            ->columns(array('title', 'img', 'txt'))
            ->where("newsTitleID = 3")
            ->orderBy("newsID DESC")
            ->limit(8)
            ->execute();

        $this->view->Billeder = $query;
    }

}