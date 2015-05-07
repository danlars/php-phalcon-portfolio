<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/15
 * Time: 8:58 AM
 */
namespace Portfolio\Frontend\Controllers;

use Phalcon\Paginator\Adapter\Model as Paginator;
use Portfolio\Models\Pages as Pages;
use Portfolio\Models\PageTitle as PageTitle;


class tasksController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Opgaver");
        parent::initialize();
        $this->view->newsTitle = PageTitle::find("page = 'N'");
    }

    public function indexAction($id = NULL){
        $idParts = explode('?', $id);
        $currentPage = $this->request->getQuery('page', 'int');

        if($idParts[0] == "") {
            $news = Pages::find();
        }else{
            $news = Pages::find("pageTitleID = " . $idParts[0]);
        }

        $paginator = new Paginator(
            array(
                "data" => $news,
                "limit"=> 10,
                "page" => $currentPage
            )
        );

        $this->view->page = $paginator->getPaginate();
        $this->view->pageID = (int)$idParts[0];
    }

    public function articleAction($id = 0){
        $query = $this->modelsManager->executeQuery(
            "SELECT B.pageID, B.img, B.title FROM Portfolio\Models\PageTitle AS A
RIGHT OUTER JOIN Portfolio\Models\Pages AS B ON A.titleID = B.pageTitleID
WHERE A.page = 'N' AND B.pageID != :id: ORDER BY RAND() LIMIT 4",
            array('id' => $id));

        $this->view->articles = $query;
        $this->view->newsArticle = Pages::findFirst($id);
    }
}