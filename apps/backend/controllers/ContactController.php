<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/10/15
 * Time: 1:17 PM
 */

namespace Portfolio\Backend\Controllers;
use Portfolio\Models\Feedback;
use Portfolio\Models\Sent;

class ContactController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Feedback");
        parent::initialize();
    }

    public function indexAction(){
        $delete = Feedback::find('deletedato IS NOT NULL AND deletedato < NOW()'); //Use MySQL Events instead
        if($delete) {
            foreach($delete as $row)
                $row->delete();
        }

        $feedback = Feedback::query()->where('deletedato IS NULL')->orderBy('dato DESC')->execute();
        $this->view->contacts = $feedback;
    }

    public function sentMsgsAction(){
        $feedback = Sent::query()->orderBy('dato DESC')->execute();
        $this->view->sentMsgs = $feedback;
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

            if($count <= 0){
                $this->flash->error('Der blev ikke valgt nogle elementer');
            }else {
                foreach ($data['check'] as $row) {
                    $model = Feedback::findFirst($row);
                    $model->deletedato = date('Y-m-d', strtotime('+1 week', time()));
                    $model->save();
                }
                $this->flash->success('De valgte feedback elementer vil blive slettet om en uge fra nu');
            }
            return $this->forward('contact/index');
        }
    }

}