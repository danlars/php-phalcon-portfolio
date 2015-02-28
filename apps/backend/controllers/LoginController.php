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

    private function _registerSession(Session $user)
    {
        $this->session->set('auth', array(
            'id' => $user->id,
            'name' => $user->name
        ));
    }

    public function validateAction(){
        if($this->request->isPost()) {
            if ($this->security->checkToken()) {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $userExist = Session::findFirst(Array('mail' => $email));

                if ($userExist) {
                    if($userExist->active == "Y" && $this->security->checkHash($password, $userExist->password)) {
                        $this->_registerSession($userExist);
                        $this->flash->success('Velkommen ' . $userExist->name); //The password is valid
                        return $this->response->redirect('admin/frontpanel/index');
                    }else
                        $this->flash->error('Din bruger er ikke længere aktiv. Kontakt administratoren for mere info');
                }else
                    $this->flash->error('Forkert Email/Password');
            }
            return $this->response->redirect('admin/login/index');
        }
        $this->dispatcher->forward(
            array(
                'controller' => 'login',
                'action' => 'index'
            )
        );
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Tak for denne gang admin!');
        return $this->response->redirect('index/index');
    }

}