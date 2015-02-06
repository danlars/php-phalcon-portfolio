<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/28/15
 * Time: 1:32 PM
 */

namespace Portfolio\Backend\Controllers;
use Portfolio\Models\Session;
use Portfolio\Backend\Forms\LoginForm;
use Phalcon\Mvc\Controller as impressive;

class LoginController extends impressive{

    public function initialize(){
        $this->tag->setTitle('Administration Login');
    }

    public function indexAction(){
        $this->view->form = new LoginForm;
    }

    public function validateAction(){
        if($this->request->isPost()) {
            if ($this->security->checkToken()) {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $userExist = Session::findFirst(Array('mail' => $email));

                if ($userExist) {
                    if ($this->security->checkHash($password, $userExist->password)) {
                        $this->flash->success('Velkommen ' . $email);//The password is valid
                    }
                }

                $this->flash->error('Forkert Email/Password' );
                return $this->response->redirect('admin/login/index');
            }
        }
    }
}