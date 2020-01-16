<?php

class view
{
    private $daten = array();

    public function assign($key, $value)
    {
        $this->daten[$key] = $value;
    }

    public function loadTemplate()
    {
        include_once 'public/templates/kopfteil_html.php';
        include_once 'public/templates/todos_html.php';
        include_once 'public/templates/neuerEintrag.php';
        include_once 'public/templates/fussteil_html.php';
    }
}