<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/27/15
 * Time: 8:33 PM
 */

namespace Portfolio\Backend;

use Phalcon\Loader,
    Phalcon\Mvc\View,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\ModuleDefinitionInterface,
    Phalcon\Events\Manager as EventsManager;

use Portfolio\Security\NotFoundPlugin;
use Portfolio\Security\Security;

class Module implements ModuleDefinitionInterface{

    public function registerAutoloaders()
    {

        $loader = new Loader();

        $loader->registerNamespaces(
            array(
                'Portfolio\Backend\Controllers'    => APP_PATH . 'apps/backend/controllers/',
                'Portfolio\Models'                 => APP_PATH . 'apps/models/',
                'Portfolio\Backend\Forms'          => APP_PATH . 'apps/backend/forms/',
                'Portfolio\Security'               => APP_PATH . 'apps/plugin/',
            )
        );

        $loader->register();
    }

    public function registerServices($di)
    {

        //Registering a dispatcher
        $di->set('dispatcher', function() {
            $eventsManager = new EventsManager;
            $dispatcher = new Dispatcher;
            /**
             * Check if the user is allowed to access certain action using the Security plugin
             */
            $eventsManager->attach('dispatch:beforeDispatch', new Security);

            /**
             * Handle exceptions and not-found exceptions using NotFoundPlugin
             */
            $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);
            $dispatcher->setDefaultNamespace("Portfolio\\Backend\\Controllers");
            $dispatcher->setEventsManager($eventsManager);

            return $dispatcher;
        });

        //Registering the view component
        $di->set('view', function() {
            $view = new View();
            $view->setViewsDir(APP_PATH . 'apps/backend/views/');
            $view->registerEngines(array(
                ".volt" => 'volt'
            ));
            return $view;
        });
    }

}