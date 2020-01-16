<?php

class controller
{
    private $request = null;
    private $template = '';

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function display()
    {
        $view = new view();
        $entry = datenbank::einlesen();
    }
}