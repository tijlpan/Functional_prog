<?php
//geef sql code op. Dit is wat je wil ophalen uit specifieke databank
$dbname = "steden";
$sql = 'select * from images where img_id ='.$_GET["img_id"];

//maak variabelen globaal die nodig zijn voor functie
global $dbname;
global $sql;

//vraag functie op
require_once "functions.php";

//roep functie aan om data op te vragen en zet deze in variabele
$data = GetData($dbname,$sql);
//returns full query ($data)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mijn eerste webpagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<div class="jumbotron text-center">
    <h1>Detail stad</h1>
</div>

<div class="container">
    <div class="row">
        <?php
        //show result (if there is any)
        if ( $data->num_rows > 0 )
        {
            //voor elke rij een associatieve array maken
            while($row = $data->fetch_assoc()) {
                print '<div class="divspecial">';
                print '<h3>'.$row["img_title"].'</h3>';
                print '<p>Filename: '.$row["img_filename"].'</p>';
                print '<p> '.$row["img_width"].' x '.$row["img_height"].' pixels</p>';
                print '<img src="./images/'.$row["img_filename"].'" width='.$row["img_width"].' height='.$row["img_height"].'>';
                print '<a href="./steden.php">Terug naar overzicht</a>';
                print '</div>';
            }
        }
        else {
            print "No records found";
        }
        ?>
    </div>
</div>
</body>
</html>


