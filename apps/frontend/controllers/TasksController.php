<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/15
 * Time: 8:58 AM
 */
namespace Portfolio\Frontend\Controllers;

use Phalcon\Paginator\Adapter\Model as Paginator;
//
use Portfolio\Models\News as News;
use Portfolio\Models\NewsTitle as NewsTitle;


class tasksController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Opgaver");
        parent::initialize();
    }

    public function indexAction($id = NULL){
        $idParts = explode('?', $id);
        $currentPage = $this->request->getQuery('page', 'int');
        if($idParts[0] == "") {
            $news = News::find();
        }else{
            $news = News::find("newsTitleID = " . $idParts[0]);
        }

        $paginator = new Paginator(
            array(
                "data" => $news,
                "limit"=> 10,
                "page" => $currentPage
            )
        );

        $this->view->newsTitle = NewsTitle::find();
        $this->view->page = $paginator->getPaginate();
        $this->view->pageID = $idParts[0];
    }

    public function articleAction($id = 0){
        $query = News::query()
            ->columns(array('newsID', 'title', 'img'))
            ->where("newsID != :id:")
            ->bind(array("id" => $id))
            ->limit(4)
            ->orderBy('rand()')
            ->execute();

        $this->view->articles = $query;
        $this->view->newsArticle = News::findFirst($id);
        $this->view->newsTitle = NewsTitle::find();
    }
}