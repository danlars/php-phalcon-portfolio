<?php

namespace Portfolio\Models;

class Pages extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $pageID;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $txt;

    /**
     *
     * @var string
     */
    public $img;

    /**
     *
     * @var integer
     */
    public $pageTitleID;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('pageTitleID', 'Portfolio\Models\PageTitle', 'titleID', array('alias' => 'PageTitle'));
    }

}
