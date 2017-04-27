<?php
namespace APIBundle\Provider\Controller;


use Silex\Application;
use Silex\Api\ControllerProviderInterface;


class AuthControllerProvider implements ControllerProviderInterface
{

    public function connect(Application $app)
    {

        $controllers = $app['controllers_factory'];
        
        $controllers 
            ->post('/resetPassword', 'APIBundle\Controller\AuthController::resetPassword')
        ;

        $controllers 
            ->post('/login', 'APIBundle\Controller\AuthController::login')
        ;

        $controllers 
            ->get('/extendtoken', 'APIBundle\Controller\AuthController::extendtoken')
            ->before('APIBundle\Controller\AuthController::validateToken')
        ;

        return $controllers;
    }
}