<?php

/*
include_once ('controller/controller.php');
include_once ('model/datenbank.php');
include_once ('view/view.php');

$abfrage = array_merge($_GET, $_POST);
$controller = new controller($abfrage);
echo $controller->display();
var_dump($abfrage);
*/

require_once(__DIR__ . '/../src/php/Model/Request.php');
require_once(__DIR__ . '/../src/php/Model/Response.php');
require_once(__DIR__ . '/../src/php/Controller.php');
require_once(__DIR__ . '/../src/php/Controller/Front.php');
require_once(__DIR__ . '/../src/php/Model/Input/Name.php');
require_once(__DIR__ . '/../src/php/Controller/CreateTodo.php');
require_once(__DIR__ . '/../src/php/Controller/ShowTodoList.php');

$parameters = array_merge($_GET, $_POST);
$request = new \Application\Model\Request($parameters);
$controller = new \Application\Controller\Front($request);
$controller->handleRequest();
$response = $controller->getResponse();
$response->send();
