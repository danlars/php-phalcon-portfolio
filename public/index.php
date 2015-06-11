<?php
error_reporting(E_ALL);
use Phalcon\Mvc\Application;

define('BASE_PATH', realpath('..') . '/');

//TODO: få pageApi'en til at route og få implementeret Parsedown til page siden i Backend

try {

    require BASE_PATH . 'apps/config/services.php';

    //Create an application
    $application = new Application($di);

    // Register the installed modules
    $application->registerModules(
        array(
            'Frontend' => array(
                'className' => 'Portfolio\Frontend\Module',
                'path'      => BASE_PATH . 'apps/frontend/Module.php'
            ),
            'Backend'  => array(
                'className' => 'Portfolio\Backend\Module',
                'path'      => BASE_PATH . 'apps/backend/Module.php'
            )
        )
    );

    //Handle the request
    echo $application->handle()->getContent();

} catch(Exception $e){
    echo "Exception: ", $e->getMessage();
}