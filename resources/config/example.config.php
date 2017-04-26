<?php
// production environment - false; test environment - true
$app['debug'] = false;

$app['api.version'] = "v1";
$app['api.endpoint'] = "https://localhost/api/";

$app['api.tokenkey'] = "exampleKEY";
$app['api.tokenpayload'] = array();

$app['api.enabledb'] = false;

/**
 * SQLite database config
 */
// $app['db.options'] = array(
//     'driver' => 'pdo_sqlite',
//     'path' => realpath(ROOT_PATH . '/sqlite.db'),
// );


/**
 * MySQL database config
 */
//$app['db.options'] = array(
//  "driver" => "pdo_mysql",
//  "user" => "dbusername",
//  "password" => "password",
//  "dbname" => "databasename",
//  "host" => "host",
//);


/**
 * Postgres database config
 */
$app['db.options'] = array(
    'driver' => 'pdo_pgsql',
    'host' => "192.168.99.100",
    'dbname' => 'testdb',
    'user' => 'postgres',
    'password' => 'mysecretpassword',
    'port' => '5432',
);
