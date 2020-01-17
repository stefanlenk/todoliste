<?php

class controller
{
    private $abfrage = null;
    //private $template = '';

    public function __construct($abfrage)
    {
        $this->abfrage = $abfrage;
    }

    public function display()
    {
        $abfrage = datenbank::einlesen();
        $view = new view();
        return $abfrage;
        $view->loadTemplate();

        //andere Reihenfolge
        /*$view = new view();
        $view->loadTemplate();
        $abfrage = datenbank::einlesen();*/

            $view->assign('nummer', $abfrage->nummer);
            $view->assign('inhalt', $abfrage->inhalt);
            $view->assign('datum', $abfrage->datum);
            $view->assign('status', $abfrage->status);
    }
}