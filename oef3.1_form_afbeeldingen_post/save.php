<?php
require_once "functions.php";
global $dbname;

print json_encode($_POST); print "<br>";

$sql = "INSERT INTO images SET " .
//" img_id=" . $_POST["img_id"] . "," .
    " img_title=" . "'" . $_POST["Title"] . "'" . "," .
    " img_filename=" . "'" . $_POST["Filename"] . "'" . "," .
    " img_width=" . "'" . $_POST["Width"] . "'" . "," .
    " img_height=" . "'" . $_POST["Height"] . "'" ;

$result = ExecSQL($dbname, $sql);

?>