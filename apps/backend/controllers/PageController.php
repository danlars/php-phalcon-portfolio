<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:16 PM
 */

namespace Portfolio\Backend\Controllers;

use Portfolio\Markdown\Parsedown as Markdown;
use Portfolio\Models\PageTitle;

class PageController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Om mig");
        parent::initialize();
    }

    public function indexAction($id){
        try{
            $PageTitle = PageTitle::findFirst(array(
                'titleID = :id: AND page = \'Y\'',
                "bind" => array('id' => $id)
            ));

            if($PageTitle != null)
                $this->view->item = $PageTitle->Pages->getFirst();
            else
                $this->view->title = "Kan ikke finde siden.";
        }catch (\Phalcon\Exception $e){
            $this->view->content = "Exception: " . $e->getMessage();
        }
    }

    public function editPostAction(){
        if($this->request->isPost()){
            if($this->request->isAjax()) {

//                $data = $this->request->getPost('text');
//                $model = Pages::findFirst(1);
//                $model->content = $data;
//
//                $model->save();
            }
        }
    }

}