<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/20/15
 * Time: 9:03 AM
 */
namespace Portfolio\Frontend\Controllers;

use Portfolio\Models\PageTitle;

class PageController extends ControllerBase{

    public function initialize()
    {
        $this->tag->setTitle('Om mig');
        parent::initialize();
    }

    public function IndexAction($id)
    {
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

}