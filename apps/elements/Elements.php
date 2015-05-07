<?php
/**
 * Created by PhpStorm.
 * User: skolepraktik
 * Date: 2/23/15
 * Time: 8:51 PM
 */

use Portfolio\Models\PageTitle;
use Phalcon\Mvc\User\Component;

class Elements extends Component{

    public function getPages($module = ""){
        $pages = PageTitle::find("page = 'Y'");

        foreach($pages as $row){
            echo "<li>";
            echo "<a class=\"button\" href=\"" . $module . "/page/index/" . $row->titleID . "\"> " . $row->title . " </a>";
            echo "</li>";
        }
    }
}