<?php

namespace Portfolio\Models;

class PageTitle extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $titleID;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $page;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('titleID', 'Portfolio\Models\Pages', 'pageTitleID', array('alias' => 'pages'));
    }
}
