<?php
use Phalcon\Flash\Session as Flashy;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Tag;
use Phalcon\Mvc\Url;
use Phalcon\DI\FactoryDefault;

// Create a DI
$di = new FactoryDefault();

//Routes
$di->set('router', function(){
    require BASE_PATH . 'apps/config/route.php';
    return $router;
});

//Mysql connection
$di->set('db', function(){
    return new Mysql(array(
        "host"     => "localhost",
        "port" => 3306,
        "charset" => "utf8",
        "username" => "portfolio",
        "password" => "mf533Ocj",
        "dbname"   => "portfolio"
    ));
});


$di->set('view', function(){
    $view = new \Phalcon\Mvc\View();
    return $view;
});

/**
 * Setting up volt
 */
$di->set('volt', function($view, $di) {

    $volt = new VoltEngine($view, $di);

    $volt->setOptions(array(
        "compiledPath" => BASE_PATH . "cache/volt/"
    ));

    $compiler = $volt->getCompiler();
    $compiler->addFunction('is_a', 'is_a');

    return $volt;
}, true);

// Setup a base URI so that all generated URIs include the "public" folder
$di->set('url', function(){
    $url = new Url();
    $url->setBaseUri('/');
    return $url;
});

// Setup the tag helpers
$di->set('tag', function() {
    return new Tag();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function() {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

$di->set('modelsManager', function() {
    return new Phalcon\Mvc\Model\Manager();
});

/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function(){
    return new Flashy(array(
        'error'   => 'alert-box alert radius',
        'success' => 'alert-box success radius',
        'notice'  => 'alert-box info radius'
    ));
});

$di->set('elements', function(){
    return new Elements();
});