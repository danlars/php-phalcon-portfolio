<?php

use Phalcon\Mvc\Router;

    $router = new Router();

    $router->setDefaultModule("Frontend");

    $router->add(
        '/:controller/:action/:params',
        array(
            'controller' => 1,
            'action' => 2,
            'params' => 3
        )
    );

    $router->add(
        "/admin/",
        array(
            "module"     => "Backend",
            "controller" => "login",
            "action"     =>  "index",
        )
    );

    $router->add(
        "/admin/:controller/:action/:params",
        array(
            "module"     => "Backend",
            "controller" => 1,
            "action"     => 2,
            "params"     => 3
        )
    );

    return $router;