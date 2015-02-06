<?php
error_reporting(E_ALL);
use Phalcon\Mvc\Application;

define('APP_PATH', realpath('..') . '/');


try {

    require APP_PATH . 'apps/config/services.php';

    //Create an application
    $application = new Application($di);

    // Register the installed modules
    $application->registerModules(
        array(
            'Frontend' => array(
                'className' => 'Portfolio\Frontend\Module',
                'path'      => APP_PATH . 'apps/frontend/Module.php'
            ),
            'Backend'  => array(
                'className' => 'Portfolio\Backend\Module',
                'path'      => APP_PATH . 'apps/backend/Module.php'
            )
        )
    );

    //Handle the request
    echo $application->handle()->getContent();

} catch(Exception $e){
    echo "Exception: ", $e->getMessage();
}