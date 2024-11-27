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
    global $arrayofstrings;
    ?>

    <div class="AllProducts">
        <?php
        $myFile = fopen("Accessories.csv", "r");
        $line = fgets($myFile);
        while (!feof($myFile)) {
            $line = fgets($myFile);
            $arrayOfPieces = explode(";", $line);
            //print("<div>" . $line . "</div>");
            if (count($arrayOfPieces) == 8) {
 
 
        ?>
 
 
                
                    <div> <?=($_SESSION["language"] == "EN") ?$arrayOfPieces[1]:$arrayOfPieces[6] ?></div>
                    <img src="../images/<?= $arrayOfPieces[5] ?>" width="400px">
                    <div class="OneProduct"> <?= $arrayOfPieces[2] ?></div>
                    <div class="OneProduct"> <?= $_SESSION["language"]== "EN" ? $arrayOfPieces[3]: $arrayOfPieces[7] ?></div>
                   <div class="OneProduct"><?=$arrayofstrings["inventory"] ?> <?= $arrayOfPieces[4] ?></div>
                
        <?php
            }
        }
        ?>
    </div>
</body>
</html>