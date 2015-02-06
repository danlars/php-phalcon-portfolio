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

    public $newsID;

    public $title;

    public $txt;

    public $img;

    public $newsTitleID;
}