
<?php

use Symfony\Component\Debug\ExceptionHandler;


/**
 * Mount
 */
$app->mount('/', new APIBundle\Provider\Controller\GlobalControllerProvider());
$app->mount('/auth', new APIBundle\Provider\Controller\AuthControllerProvider());


//register an error handler for all other errors
$app->error(function ( \Exception $e, $code ) use ($app) {

    //use this when debug
    $handler = new ExceptionHandler();
    $handler->handle( $e );

    //return your json response here
    $error = array('message' => $e->getMessage() );
    return $app->json( $error, 200 );
});
