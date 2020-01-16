<?php

while ($daten = $db->fetch_object())
{
    /*$nummer = $daten->nummer;
    $inhalt = $daten->inhalt;
    $datum = $daten->datum;
    $status = $daten->status;*/

    echo
        '<tr>
    <td>' . $daten->nummer . '</td>  
    <td>' . $daten->inhalt . '</td>
    <td>' . $daten->datum . '</td>
    <td><label><input type="button" name="status" value="' . $daten->status . '"></label></td>
    <td><label><input type="submit" name="loeschen" value="löschen"></label></td>
    </tr>
    ';
}