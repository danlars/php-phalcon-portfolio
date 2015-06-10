<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:16 PM
 */

namespace Portfolio\Backend\Controllers;

use Portfolio\Backend\Forms\PageForm;
use Portfolio\Markdown\Parsedown as Markdown;
use Portfolio\Models\PageTitle;

class PageController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Om mig");
        parent::initialize();
        $this->view->links = array(
            array(
                "name"  => "Rediger",
                "id"    => "edit"
                ),
            array(
                "name"  => "Slet side",
                "id"    => "delete"
            )
        );
    }

    public function indexAction($id){
        try{
            $PageTitle = PageTitle::findFirst(array(
                'titleID = :id: AND page = \'Y\'',
                "bind" => array('id' => $id)
            ));

            if($PageTitle != null) {
                $this->view->item = $PageTitle->Pages->getFirst();
                $form = new PageForm();
                $form->setEntity($PageTitle->Pages->getFirst());
                $this->view->form = $form;
            }
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