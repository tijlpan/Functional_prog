<?php
    //geef sql code op. Dit is wat je wil ophalen uit specifieke databank
    $dbname = "steden";
    $sql = "select * from images";

    //maak variabelen globaal die nodig zijn voor functie
    global $dbname;
    global $sql;
    global $icon_title;
    global $title;
    global $subtitle;

    //vraag functies op
    require_once "functions.php";
    require_once "html_components.php";

    //roep functie aan om data op te vragen en zet deze in variabele
    $data = GetData($dbname,$sql);
    //returns full query ($data)

    // definieer variabelen voor html functies: head & jumbotron (bootstrap) en roep deze functies aan
    $icon_title = "Mijn eerste website"; // dit is wat bovenaan als icon titel komt te staan.
    $title = "Leuke plekken in Europa"; // de titel van je document (h1)
    $subtitle = "een samenvatting van leuke plekjes doorheen Europa"; // de subtitel (p)
    PrintHead($icon_title);
    PrintBody();
    PrintJumbo($title, $subtitle);
?>

<div class="container">
    <div class="row">
        <?php
        //show result (if there is any)
        if ( $data->num_rows > 0 )
        {
            //voor elke rij een associatieve array maken
            while($row = $data->fetch_assoc()) {
                print '<div class="col-sm-4">';
                print '<h3>'.$row["img_title"].'</h3>';
                print '<p> '.$row["img_width"].' x '.$row["img_height"].' pixels</p>';
                print '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>';
                print '<img src="./images/'.$row["img_filename"].'" width='.$row["img_width"].' height='.$row["img_height"].'>';
                print '<a href="./stad.php?img_id='.$row["img_id"].'">Meer info</a>';
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
