<?php
require '../vendor/autoload.php';

define('VIEW_PATH', dirname(__DIR__) . "/views");

//debug
showHideErrors();


//var_dump(VIEW_PATH);
$router = new DGRSDT_CANDIDAT\Router(VIEW_PATH);
$router
    ->get('/', '/index', 'Home')
    ->get('/notfound', '/404', 'error')
    ->get('/candidat/[i:id]', '/candidats/index', 'candidat')


    /**Administartion **/
    ->get('/admin', 'admin/index', 'admin-dashboard')
    ->get('/admin', 'admin/login', 'admin-login')
    ->get('/admin', 'admin/profile', 'admin-profile')
    ->get('/admin', 'admin/register', 'admin-register')
    ->get('/admin', 'admin/table', 'admin-table')
    ->run();



/*
if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
}
else {
    header("HTTP/1.0 404 Not Found");
    require VIEW_PATH.'/404.php';
}
*/