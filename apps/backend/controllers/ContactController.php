<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:17 PM
 */

namespace Portfolio\Backend\Controllers;
use Portfolio\Models\Feedback;

class ContactController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Feedback");
        parent::initialize();
    }

    public function indexAction(){

        try {
            $phql = "DELETE FROM Portfolio\Models\Feedback WHERE deletedato IS NOT NULL AND deletedato < NOW()";
            $this->modelsManager->executeQuery($phql);
        }catch (\Phalcon\Exception $e){
            $this->flash->error("Exception: " . $e);
        }

        $feedback = Feedback::query()->where('deletedato IS NULL')->orderBy('dato DESC')->execute();
        $this->view->contacts = $feedback;
    }

    public function delMsgsAction(){
        $feedback = Feedback::query()->where('deletedato IS NOT NULL')->orderBy('dato DESC')->execute();
        $this->view->contacts = $feedback;
    }

    public function editMsgAction($id){
        $feedback = Feedback::findFirst($id);
        $feedback->status = 'Y';
        $feedback->save();
    }

    public function moveToDeleteAction(){
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $count = count($data['check']);

            if($count <= 0)
                $this->flash->error('Der blev ikke valgt nogle elementer');
            else {
                foreach ($data['check'] as $row) {
                    $model = Feedback::findFirst($row);
                    $model->deletedato = date('Y-m-d', strtotime('+1 week', time()));
                    $model->save();
                }
                $this->flash->success('De valgte feedback elementer vil blive slettet om en uge fra nu');
            }
        }
        return $this->forward('contact/index');
    }
}