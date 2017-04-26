<?php
namespace APIBundle\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use APIBundle\Provider\Services;

class AuthController
{
    private $authenticationService;

    public function __construct()
    {
      //$this->authenticationService = new AuthenticationService();
    }

    public function resetPassword(Application $app) {
      //TODO, perform real password reset and email user the new password

      $res = array ('message' => 'New temp password has been sent, please use the new temp password to login, after login please change your temp password');
      return $app->json($res, 200);
    }

    public function login (Application $app) {
      $res = array('message' => 'placeholder message');
      return $app->json($res, 200);
    }



}