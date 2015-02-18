<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:16 PM
 */

namespace Portfolio\Backend\Controllers;

use Portfolio\Models\Page;

class AboutController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Om mig");
        parent::initialize();
    }

    public function indexAction(){

    }

    public function editPostAction(){
        if($this->request->isPost()){
            if($this->request->isAjax()) {

                $data = $this->request->getPost('text');
                $model = Page::findFirst(1);
                $model->content = $data;

                $model->save();
            }
        }
    }

}