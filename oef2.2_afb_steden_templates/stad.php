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

require_once "html_components.php";
PrintHead();
?>
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


