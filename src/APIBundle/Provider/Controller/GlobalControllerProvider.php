<?php
namespace APIBundle\Provider\Controller;


use Silex\Application;
use Silex\Api\ControllerProviderInterface;
class GlobalControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        
        $controllers 
            ->get('/', 'APIBundle\Controller\GlobalController::testAction')
            ->before(function(){})
        ;

        $controllers ->post('/', 'APIBundle\Controller\GlobalController::testActionpost');

        return $controllers;
    }
}