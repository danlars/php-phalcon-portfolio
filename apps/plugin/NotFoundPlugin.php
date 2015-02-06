<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/29/15
 * Time: 7:09 PM
 */

namespace Portfolio\Security;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Dispatcher;
use Phalcon\Mvc\Dispatcher\Exception as DispatcherException;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

/**
 * NotFoundPlugin
 *
 * Handles not-found controller/actions
 */
class NotFoundPlugin extends Plugin
{

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     */
    public function beforeException(Event $event, MvcDispatcher $dispatcher, DispatcherException $exception)
    {
        if ($exception instanceof DispatcherException) {
            switch ($exception->getCode()) {
                case Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                    $dispatcher->forward(array(
                        'controller' => 'errors',
                        'action' => 'p404'
                    ));
                    return false;
            }
        }

        $dispatcher->forward(array(
            'controller' => 'errors',
            'action'     => 'p500'
        ));
        return false;
    }
}