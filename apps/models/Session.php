<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/5/15
 * Time: 6:19 PM
 */

namespace Portfolio\Models;

use Phalcon\Mvc\Model;

class Session extends Model{

    public $id;

    public $mail;

    public $password;

    public $name;

    public $active;
}