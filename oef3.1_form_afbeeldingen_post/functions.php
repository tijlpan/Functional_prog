<?php

function GetData( $dbname, $sql )
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // execute given query
    $result = $conn->query($sql);
    // build data array

    $data = [];
    if ( $result->num_rows > 0 )
    {
        while( $row = $result->fetch_assoc() )
        {
            $data[] = $row;
        }
    }

    // close connection
    $conn->close();

    // return data array
    return $data;
}
function ExecSQL( $dbname, $sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // execute given query
    $result = $conn->query($sql);

    return $result;
}
function CreateInput ($label, $placeholder, $optional="") {
    print '<label for="'.$label.'" class="col-sm-2 col-form-label ">'.$label.'</label>';
    print '<div class="col-sm-10">';
    print '<input type="text" '.$optional.' class="form-control-plaintext" name="'.$label.'" id="'.$label.'" placeholder="'.$placeholder.'">';
    print '</div>';
}
function CreateSubmit ($value) {
    print '<div class="col-sm-10">';
    print '<input type="submit" id="btn_submit" value="'.$value.'"></input>';
    print '</div>';
}

