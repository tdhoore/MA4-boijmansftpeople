<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'home' => array(
    'controller' => 'Art',
    'action' => 'index'
  ),
  'party' => array(
    'controller' => 'Art',
    'action' => 'party'
  ),
  'subs' => array(
    'controller' => 'Art',
    'action' => 'subs'
  ),
  // 'add-to-cart' => array(
  //     'controller' => 'Art',
  //     'action' => 'add_product'
  // ),
  // 'handleCart' => array(
  //     'controller' => 'Art',
  //     'action' => 'handleCart'
  // ),
  // 'handlePersonalData' => array(
  //     'controller' => 'Art',
  //     'action' => 'handlePersonalData'
  // )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
