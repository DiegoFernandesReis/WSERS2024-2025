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
            if (count($arrayOfPieces) == 11) {
 
 
        ?>
 
 
                
                    <div> <?=($_SESSION["language"] == "EN") ?$arrayOfPieces[1]:$arrayOfPieces[6] ?></div>
                    <?php  if(isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 2) {
                        
                        ?>
                        <div class="Navcenter"><?=$arrayOfPieces[8] ?></div><?php
                    }
                    ?>
                    <img src="../images/<?= $arrayOfPieces[5] ?>" width="400px">
                    <div class="OneProduct"> <?= $arrayOfPieces[2] ?></div>
                    <div class="OneProduct"> <?php if ($_SESSION["language"]== "EN") print ($arrayOfPieces[3]); else print($arrayOfPieces[7]) ?></div>
                   <div class="OneProduct"><?php if ($_SESSION["language"] == "EN") print($arrayOfPieces[4]);else print($arrayOfPieces[9]) ?></div>
                   <button class="OneProduct"><?php if ($_SESSION["language"] == "EN") print($arrayOfPieces[8]); else print($arrayOfPieces[10]) ?></button>
                
        <?php
            }
        }
        ?>
    </div>
</body>
</html>