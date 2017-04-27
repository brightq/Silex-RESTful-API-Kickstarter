<?php
namespace APIBundle\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \APIBundle\Provider\Services\TokenService;
use \APIBundle\Provider\Services\AuthService;

class AuthController{


    /**
     * Reset Password 
     *
     *
     *
     */
    public function resetPassword(Request $request, Application $app) {

        //init the authservices
        $AuthService = new AuthService($app['db']);

        //load request json in array
        $data = json_decode($request->getContent(), true);

        //validate and check the post payload, return 400 bad request if there is no username and password in the post payload
        if (!isset($data["username"])){
            $res = array('message' => 'Bad input parameters - username is required');
            return $app->json($res, 400);
        }

        $userID = $AuthService->getUserIDByUsername($data["username"]);

        //check if user has been found based on supplied user name
        if ($userID){

            //write your own code to perform the real password reset in your system
            $res = array ('message' => 'New temp password has been sent, please use the new temp password to login, after login please change your temp password');
            return $app->json($res, 200);

        }else{

            //return error message when user can not find
            $res = array('message' => 'User can not be found in the system');
            return $app->json($res, 401);
        }

    }



    /**
     * Login
     * return JWT access token after login
     *
     *
     *
     */
    public function login (Request $request, Application $app) {
      
        $AuthService = new AuthService($app['db']);
        $TokenService = new TokenService($app['api.tokensecret']);

        //load request json in array
        $data = json_decode($request->getContent(), true);

        //validate and check the post payload, return 400 bad request if there is no username and password in the post payload
        if (!isset($data["username"]) || !isset($data["password"])){
            $res = array('message' => 'Bad input parameters - username, password are both required');
            return $app->json($res, 400);
        }


        //call validate username and password function to get userid
        $userID =   $AuthService->getUserIDByUsernameAndPassword($data["username"], $data["password"]);

        if ($userID){
            //after user login set the JWT token payload, and pass into token service to generate token
            $payload = array(
                "userID" => $userID,
            );

            //generate token
            $token = $TokenService->generateToken($payload);
            $res['token'] = $token; 

            return $app->json($res, 200);
        }else{
            //return error message when invalid username and password supplied
            $res = array('message' => 'Invalid Username or Password');
            return $app->json($res, 401);
        }

    }


    /**
     * Extend token session
     * return JWT access token after login
     * 
     *
     *
     */
    public function extendToken (Request $request, Application $app) {

        $TokenService = new TokenService($app['api.tokensecret']);
        $header = getallheaders();
        if (preg_match('/Bearer\s(\S+)/', $header['Authorization'], $matches)) {
            $token = $matches[1];
            $newToken = $TokenService->extendToken($token);
            $res['token'] = $newToken; 
            return $app->json($res, 200);
        }
        
    }



    /**
     * Validate token 
     * return error message when token is invalidate
     *
     *
     *
     */
    public function validateToken (Request $request, Application $app) {

        $TokenService = new TokenService($app['api.tokensecret']);

        $header = getallheaders();
        if (!empty($header['Authorization'])) {
            if (preg_match('/Bearer\s(\S+)/', $header['Authorization'], $matches)) {
                $token = $matches[1];
                $validate = $TokenService->validateToken($token);
                if ($validate) {
                    return Null;
                }else{
                    $error = array('message' => "Invalid or expired Token, Shall Not Pass" );
                    return $app->json( $error, 401 );
                }
            }
        }else{
            $error = array('message' => "Missing Authorization Token, Shall Not Pass" );
            return $app->json( $error, 401 );
        }
    }
}