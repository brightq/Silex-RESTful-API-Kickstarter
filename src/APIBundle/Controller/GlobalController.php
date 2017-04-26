<?php
namespace APIBundle\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalController
{
    public function testAction(Application $app) {
      $res['message'] = "test message";
      return $app->json($res, 200);
    }

    public function testActionpost(Application $app) {
      $res['message'] = "test message post";
      return $app->json($res, 200);
    }
}