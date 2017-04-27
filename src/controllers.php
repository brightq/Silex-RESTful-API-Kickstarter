
<?php

use Symfony\Component\Debug\ExceptionHandler;


// $app['auth.service'] = function($app) {
//     return new \APIBundle\Provider\Services\AuthService($app["db"]);
// };

// $app['auth.controller'] = function($app) {
//     return new APIBundle\Provider\Controller\AuthControllerProvider($app['auth.service']);
// };
        

/**
 * Mount
 */
$app->mount('/', new APIBundle\Provider\Controller\GlobalControllerProvider());
$app->mount('/auth', new APIBundle\Provider\Controller\AuthControllerProvider());
//$app->mount('/auth', $app['auth.controller']);


//register an error handler for all other errors
$app->error(function ( \Exception $e, $code ) use ($app) {

    //use this when debug
    $handler = new ExceptionHandler();
    $handler->handle( $e );

    //return your json response here
    $error = array('message' => $e->getMessage() );
    return $app->json( $error, 200 );
});
