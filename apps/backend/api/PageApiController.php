<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 5/4/15
 * Time: 9:10 AM
 */

namespace Portfolio\Backend\Api;

use Phalcon\Mvc\View;
use Phalcon\Http\Request;
use Portfolio\Models\Pages;
use Portfolio\Models\PageTitle;
use Portfolio\Backend\Forms\PageForm;

class PageApiController extends \Phalcon\Mvc\Controller
{
    private $request, $form;

    public function initialize(){
        $this->view->disable();
        $this->request = new Request();
        $this->form = new PageForm();
    }

    public function GetAction($id)
    {
        if($this->request->isAjax() == true)
        {
            $PageTitle = PageTitle::findFirst(array(
                'titleID = :id: AND page = \'Y\'',
                "bind" => array('id' => $id)
            ));

            $page = $PageTitle->Pages->getFirst();
            echo json_encode($page);
        }else
            echo "You do not have access to this awesomeness site, BIATCH!!";
    }

    public function PutAction()
    {
        if ($this->request->isAjax() == true){
            // Validate the form
            $data = $this->request->getPost();
            $model = new Pages();

            if (!$this->form->isValid($data, $model)) {
                return "Der er noget galt med indholdet, tjek at teksten ikke er mærkelig og du uploader et billede";
            }

            if ($model->save() == false) {
                foreach ($model->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->forward('contact/index');
            }
        }
    }
}