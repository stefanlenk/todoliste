<?php

include_once ('controller/controller.php');
include_once ('model/datenbank.php');
include_once ('view/view.php');

$abfrage = array_merge($_GET, $_POST);
$controller = new controller($abfrage);
echo $controller->display();
var_dump($abfrage);