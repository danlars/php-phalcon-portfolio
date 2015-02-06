<?php
namespace Portfolio\Backend\Controllers;

use Phalcon\Mvc\Controller as impressive;

    class ControllerBase extends impressive
    {

        protected function initialize()
        {
            $this->tag->prependTitle('Admin Portfolio | ');
            $this->view->setTemplateAfter('menu');
        }

        protected function forward($uri)
        {
            $uriParts = explode('/', $uri);
            $params = array_slice($uriParts, 2);
            return $this->dispatcher->forward(
                array(
                    'controller' => $uriParts[0],
                    'action' => $uriParts[1],
                    'params' => $params
                )
            );
        }

    }
