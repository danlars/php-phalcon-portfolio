<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/27/15
 * Time: 1:48 PM
 */

namespace Portfolio\Frontend;

use Phalcon\Mvc\View,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\ModuleDefinitionInterface,
    Phalcon\Events\Manager as EventsManager;
use Portfolio\Security\NotFoundPlugin;

class Module implements ModuleDefinitionInterface{

    public function registerAutoloaders(\Phalcon\DiInterface $dependencyInjector = null)
    {

        $loader = new \Phalcon\Loader();

        $loader->registerNamespaces(
            array(
                'Portfolio\Frontend\Controllers'    => APP_PATH . 'apps/frontend/controllers/',
                'Portfolio\Models'                  => APP_PATH . 'apps/models/',
                'Portfolio\Frontend\Forms'          => APP_PATH . 'apps/frontend/forms/',
                'Portfolio\Security'                => APP_PATH . 'apps/plugin/',
            )
        );

        $loader->registerDirs(array(
            APP_PATH . 'apps/elements/'
        ));

        $loader->register();

    }

    public function registerServices(\Phalcon\DiInterface $di) //DependencyInjector
    {

        //Registering a dispatcher
        $di->set('dispatcher', function() {
            $eventsManager = new EventsManager;
            $dispatcher = new Dispatcher;

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