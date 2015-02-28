<?php
/**
 * Created by PhpStorm.
 * User: skolepraktik
 * Date: 2/23/15
 * Time: 8:51 PM
 */

namespace Portfolio\Elements;

use Portfolio\Models\PageTitle;
use Phalcon\Mvc\User\Component;

class Elements extends Component{

    public function getMenu(){
        $pages = PageTitle::find('page = Y');

        foreach($pages as $row){
            
        }

    }
}