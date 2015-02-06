<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/22/15
 * Time: 12:15 PM
 */
namespace Portfolio\Models;

use Phalcon\Mvc\Model;

class Feedback extends Model{

    public $id;

    public $FullName;

    public $Email;

    public $tlf;

    public $title;

    public $txt;
}