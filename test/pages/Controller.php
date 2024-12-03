<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../style.css?<?=time(); ?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>pro controller</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("controller");
    ?>

   <div class="AllProducts">
        <?php
        $myFile = fopen("Controller.csv", "r");
        $line = fgets($myFile);
        while (!feof($myFile)) {
            $line = fgets($myFile);
            $arrayOfPieces = explode(";", $line);
            //print("<div>" . $line . "</div>");
            if (count($arrayOfPieces) == 11) {
 
 
        ?>
 
 
                
                    <div><?= $arrayOfPieces[1] ?></div>
                    <img src="../images/<?= $arrayOfPieces[5] ?>" width="400px">
                    <div class="OneProduct"> <?= $arrayOfPieces[2] ?></div>
                    <div class="OneProduct"><?= $_SESSION["language"]== "EN" ? $arrayOfPieces[3]: $arrayOfPieces[7] ?></div>
                    <div class="OneProduct"><?php if ($_SESSION["language"] == "EN") print($arrayOfPieces[4]);else print($arrayOfPieces[9]) ?></div>
                   <button class="OneProduct"><?php if ($_SESSION["language"] == "EN") print($arrayOfPieces[8]); else print($arrayOfPieces[10]) ?></button>
                
        <?php
            }
        }
        ?>
    </div>
 
  </body>



   