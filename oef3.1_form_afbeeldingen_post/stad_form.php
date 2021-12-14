<?php
//maak variabelen globaal die nodig zijn voor functie
global $dbname;
global $sql;

//geef sql code op. Dit is wat je wil ophalen uit specifieke databank
$dbname = "steden";
$sql = 'select * from images where img_id=' . $_GET["img_id"];

//vraag functie op
require_once "functions.php";
//returns full query ($data)

$icon_title = "bewerken";
$title = "Bewerk afbeelding";
$subtitle = "";

require_once "html_components.php";
PrintHead($icon_title);
PrintBody();
PrintJumbo($title,$subtitle);

?>
<body>

<div class="container">
    <div class="row">
        <?php
        //show result (if there is any)
         $rows = GetData($dbname, $sql);

        //hoewel er maar 1 rij is, kunnen we hier ook een foreach gebruiken...
        foreach ( $rows as $row )
        {
                print '<div class="divspecial">';
                print '<form id="mainform" name="mainform" method="post" action="save.php">';
                print '<div class="form-group row">';
                CreateInput("ID",$row["img_id"], "readonly");
                CreateInput("Title",$row["img_title"]);
                CreateInput("Filename",$row["img_filename"]);
                CreateInput("Width",$row["img_width"]);
                CreateInput("Height",$row["img_height"]);
                CreateSubmit("Save");
                print '</div>';
                print '</form>';
                print '<img src="./images/'.$row["img_filename"].'" width='.$row["img_width"].' height='.$row["img_height"].'>';
                print '<a href="./steden.php">Terug naar overzicht</a>';
                print '</div>';
            }
        ?>
    </div>
</div>
</body>
</html>


