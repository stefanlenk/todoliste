<?php

$db = new mysqli('localhost', 'root', '', 'todoliste');

$db->set_charset('utf8');

if ($db->connect_errno)
{
    die('Sorry - es gibt gerade ein Problem');
}
