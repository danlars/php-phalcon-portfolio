<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/15
 * Time: 8:58 AM
 */
namespace Portfolio\Frontend\Controllers;

use Portfolio\Models\Feedback;
use Portfolio\Frontend\Forms\ContactForm;

class ContactController extends ControllerBase{

    public function initialize(){
        $this->tag->setTitle("Kontakt");
        parent::initialize();
    }

    public function indexAction(){

        $this->view->form = new ContactForm;
    }

    public function sendAction(){

        if ($this->request->isPost() != true) {
            return $this->forward('contact/index');
        }

        $form = new ContactForm;
        $contact = new Feedback();

        // Validate the form
        $data = $this->request->getPost();
        if (!$form->isValid($data, $contact)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->forward('contact/index');
        }

        if ($contact->save() == false) {
            foreach ($contact->getMessages() as $message) {
                $this->flash->error($message);
                return $this->forward('contact/index');
            }
        }

        $form->clear();

        $this->flash->success("Formen er sendt, tak for din feedback");
        return $this->response->redirect('contact/index');
    }
}