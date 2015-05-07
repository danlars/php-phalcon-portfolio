<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 5/4/15
 * Time: 9:10 AM
 */

namespace Portfolio\Backend\Api;
use Portfolio\Models\PageTitle;


class PageApi {

    public function GetAction($id){
        $PageTitle = PageTitle::findFirst(array(
            'titleID = :id: AND page = \'Y\'',
            "bind" => array('id' => $id)
        ));

        echo json_encode($PageTitle);
    }

    public function PutAction($id){

    }

    public function DeleteAction($id){

    }
}