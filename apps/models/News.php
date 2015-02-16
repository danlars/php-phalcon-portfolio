<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/24/15
 * Time: 3:01 PM
 */
namespace Portfolio\Models;

use \Phalcon\Mvc\Model;

class News extends Model{

    public $NewsID;

    public $Title;

    public $Txt;

    public $Img;

    public $NewsTitleID;
}