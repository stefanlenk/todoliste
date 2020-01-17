<?php

class view
{
    private $abfrage = array();

    public function assign($key, $value)
    {
        $this->abfrage[$key] = $value;
    }

    public function loadTemplate()
    {
        include_once __DIR__ . "../templates/kopfteil_html.php";
        include_once __DIR__ . '../templates/todos_html.php';
        include_once __DIR__ . '../templates/neuerEintrag.php';
        include_once __DIR__ . '../templates/fussteil_html.php';
    }
}