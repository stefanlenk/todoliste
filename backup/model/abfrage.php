<?php

require_once __DIR__ . '/inc/db.php';

$abfrage = $db->query("SELECT * FROM todoliste.liste");

while ($request = $abfrage->fetch_object())
{
    $nummer = $request->nummer;
    $inhalt = $request->inhalt;
    $datum = $request->datum;
    $status = $request->status;
}
