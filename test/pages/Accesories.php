<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css?<?=time()?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <meta charset="UTF-8">
    <title>Accesories</title>
</head>
<body>
<?php
    include_once("Commoncode.php");
    NavigationBar("Accesories");
    ?>
    <br><a href="../pages_fr/Accesories.php">francais</a>
    <div class="AllProducts">
        <?php
        $myFile = fopen("Accessories.csv", "r");
        $line = fgets($myFile);
        while (!feof($myFile)) {
            $line = fgets($myFile);
            $arrayOfPieces = explode(";", $line);
            //print("<div>" . $line . "</div>");
            if (count($arrayOfPieces) == 6) {
 
 
        ?>
 
 
                
                    <div> <?= $arrayOfPieces[1] ?></div>
                    <img src="../images/<?= $arrayOfPieces[5] ?>" width="400px">
                    <div class="OneProduct"> <?= $arrayOfPieces[2] ?></div>
                    <div class="OneProduct"> <?= $arrayOfPieces[3] ?></div>
                   <div class="OneProduct">Inventory: <?= $arrayOfPieces[4] ?></div>
                
        <?php
            }
        }
        ?>
    </div>
</body>
</html>