<?php
function PrintHead($icon_title) {
    $data = file_get_contents("./templates/head.html");
    $result = str_replace("@@title@@", $icon_title, $data);
    print $result;
}
function PrintBody() {
    print "<body>";
}
function PrintJumbo($title, $subtitle) {
    $data = file_get_contents("./templates/jumbo.html");
    $result = str_replace(array("@@title@@", "@@subtitle@@"), array($title, $subtitle), $data);
    print $result;
}