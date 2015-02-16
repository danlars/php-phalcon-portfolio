<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2/13/15
 * Time: 10:35 PM
 */

namespace Portfolio\Models;
use Phalcon\Mvc\Model;

class Sent extends Model{

    public $Id;

    public $FullName;

    public $Email;

    public $Title;

    public $Txt;

    public $Dato;
}