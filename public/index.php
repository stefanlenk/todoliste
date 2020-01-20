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

use Application\Controller\Front;
use Application\Model\Request;

require_once(__DIR__ . '/../src/php/AutoLoad.php');

$parameters = array_merge($_GET, $_POST);
$request = new Request($parameters);
$controller = new Front($request);
$controller->handleRequest();
$response = $controller->getResponse();
$response->send();
