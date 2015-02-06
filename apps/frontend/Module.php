<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/27/15
 * Time: 1:48 PM
 */

namespace Portfolio\Frontend;

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
                'Portfolio\Frontend\Controllers'    => APP_PATH . 'apps/frontend/controllers/',
                'Portfolio\Models'                  => APP_PATH . 'apps/models/',
                'Portfolio\Frontend\Forms'          => APP_PATH . 'apps/frontend/forms/',
                'Portfolio\Security'                => APP_PATH . 'apps/plugin/',
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

            $eventsManager->attach('dispatch:beforeDispatch', new Security);
            /**
             * Handle exceptions and not-found exceptions using NotFoundPlugin
             */
            $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);

            $dispatcher->setEventsManager($eventsManager);
            $dispatcher->setDefaultNamespace("Portfolio\\Frontend\\Controllers");
            return $dispatcher;
        });

        //Registering the view component
        $di->set('view', function() {
            $view = new View();
            $view->setViewsDir(APP_PATH . 'apps/frontend/views/');
            $view->registerEngines(array(
                ".volt" => 'volt'
            ));
            return $view;
        });
    }

}