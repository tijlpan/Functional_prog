    <?php
    //geef sql code op. Dit is wat je wil ophalen uit specifieke databank
    $dbname = "steden";
    $sql = "select * from images";

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
        <h1>Leuke plekken in Europa</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <div class="container">
        <div class="row">
            <?php
            //show result (if there is any)
            $rows = GetData($dbname, $sql);

            //hoewel er maar 1 rij is, kunnen we hier ook een foreach gebruiken...
            foreach ( $rows as $row )
            {
                    print '<div class="col-sm-4">';
                    print '<h3>'.$row["img_title"].'</h3>';
                    print '<p> '.$row["img_width"].' x '.$row["img_height"].' pixels</p>';
                    print '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>';
                    print '<img src="./images/'.$row["img_filename"].'" width='.$row["img_width"].' height='.$row["img_height"].'>';
                    print '</div>';
                }
            ?>
        </div>
    </div>
    </body>
    </html>