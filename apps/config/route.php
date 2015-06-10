<?php

use Phalcon\Mvc\Router;

    $router = new Router();

    $router->setDefaultModule("Frontend");
    $router->setDefaultAction("index");

    $router->add(
        '/:controller/:action/:params',
        array(
            'controller' => 1,
            'action' => 2,
            'params' => 3
        )
    );

    $router->add(
        "/admin[/]{0,1}",
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

    $router->addGet("/admin/PageApi/:action/([1-9]+)",
        array(
            "module"     => "Backend",
            "namespace"  => "Portfolio\\Backend\\Api",
            "controller" => "page_api",
            "action"     => 1,
            "id"     => 2
        ));

    return $router;