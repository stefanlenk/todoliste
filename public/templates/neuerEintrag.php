<?php

echo
    '<tr>
     <td>'. $_REQUEST['nummmer'].'</td>
     <td><input id="inhalt" type="text" value="'. $_REQUEST['inhalt'] .'"></td>
     <td><input id="datum" type="text" value=""></label></td>
     <td><label><input type="button" id="status" value="'. $_REQUEST['status'] .'"></label></td>
     <td><label><input type="submit" value="speichern"></label></td>
     </tr>
     ';
