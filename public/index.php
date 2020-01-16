<?php

include('controller/controller.php');
include ('model/datenbank.php');
include ('view/view.php');

$request = array_merge($_GET, $_POST);
$controller = new controller($request);
echo $controller->display();