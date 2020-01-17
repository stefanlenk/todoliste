<?php

$zeile = "";
foreach ($zeile as $request)
{
    /*$nummer = $daten->nummer;
    $inhalt = $daten->inhalt;
    $datum = $daten->datum;
    $status = $daten->status;*/

    echo
        '<tr>
        <td>' . $zeile->nummer . '</td>  
        <td>' . $zeile->inhalt . '</td>
        <td>' . $zeile->datum . '</td>
        <td><label><input type="button" name="status" value="' . $zeile->status . '"></label></td>
        <td><label><input type="submit" name="loeschen" value="löschen"></label></td>
        </tr>
    ';
}