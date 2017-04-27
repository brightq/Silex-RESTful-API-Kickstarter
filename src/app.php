<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ParameterBag;
use \Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();

$app->register(new JDesrosiers\Silex\Provider\CorsServiceProvider(), [
    "cors.allowOrigin" => "*",
]);

// regist doctrine when db enbaled
//if ($app['api.enabledb']){
    $app->register(new Silex\Provider\DoctrineServiceProvider(), array(
        "db.options" => $app["db.options"]
    ));
//}


$app['auth.service'] = function($app) {
    return new \APIBundle\Provider\Services\AuthService($app["db"]);
};
        
return $app;

