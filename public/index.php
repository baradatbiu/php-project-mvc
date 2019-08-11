<?php
require '../Base/DB.php';
require '../App/Models/modelUser.php';
require '../App/Models/modelFile.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);
session_start();
$controllerName = $parts[1];
$actionName = $parts[2];
$controllerFileName = ucfirst($controllerName);
if ($controllerFileName !== 'Index') {
  header("HTTP/1.1 404 Not Found");
  return false;
}
include "../App/Controllers/$controllerFileName.php";
$controllerObj = new $controllerName();

$actionFuncName = $actionName . 'Action';

if (!method_exists($controllerObj, $actionFuncName)) {
  header("HTTP/1.1 404 Not Found");
  return false;
}

$tpl = '../App/Templates/' . $controllerFileName . '/' . $actionName . '.php';

include "../Base/View.php";
$view = new View();
$controllerObj->view = $view;
$controllerObj->$actionFuncName();
$view->render($tpl);
