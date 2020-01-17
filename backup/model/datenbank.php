<?php

class datenbank
{
    public $toDos;
    public $inhalt;
    public $datum;
    public $status;
    private $erg;
    private $db;
    private $einlesenDatenbank;

    /*public function __construct()
    {
        $db = new mysqli('localhost', 'root', '', 'todoliste');

        $db->set_charset('utf8');

        if ($db->connect_errno)
        {
            die('Sorry - es gibt gerade ein Problem');
        }
    }*/

    public static function einlesen()
    {
        $db = new mysqli('localhost', 'root', '', 'todoliste');

        $db->set_charset('utf8');

        if ($db->connect_errno)
        {
            die('Sorry - es gibt gerade ein Problem');
        }

        $erg = $db->query("SELECT * FROM todoliste.liste");

        $einlesenDatenbank = $erg->fetch_object();
        /*while ($einlesenDatenbank = $erg->fetch_object())
        {
            $einlesenDatenbank->nummer;
            $einlesenDatenbank->inhalt;
            $einlesenDatenbank->datum;
            $einlesenDatenbank->status;
        }*/
        return $einlesenDatenbank;
        //var_dump($einlesenDatenbank);
        $erg->free();
    }

    public function eintragen($nummer, $inhalt, $datum, $status)
    {
        $nummer = $_REQUEST['nummmer'];
        $inhalt = $_REQUEST['inhalt'];
        $datum = $_REQUEST['datum'];
        $status = $_REQUEST['status'];

        $sql = "INSERT INTO todoliste.liste (nummer, inhalt, datum, status)
                VALUES (?,?,?,?)";

        $statement = $db->prepare($sql);

        $statement->bind_param('isis',$nummer, $inhalt, $datum, $status);
    }

    public function loeschen($nummer)
    {
        $this->nummer = $nummer;

        $sql = "DELETE FROM todoliste.liste WHERE nummer =" . $nummer;

        $statement = $db->prepare($sql);

        $statement->bind_param('i', $nummer);
    }

    public function erledigt($nummer ,$status)
    {
        $this->nummer = $nummer;
        $this->status = $status;

        $sql = "UPDATE todoliste.liste SET Status=1 WHERE nummer=" . $nummer;

        $statement = $db->prepare($sql);

        $statement->bind_param('is', $nummer, $status);
    }
}