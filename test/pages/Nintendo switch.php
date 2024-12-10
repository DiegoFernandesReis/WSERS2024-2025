<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../style.css?<?=time()?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>Nintendo switch</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("nintendoswitch");
    ?>
    
   <div class="AllProducts">
        <?php
        $myFile = fopen("NintendoSwitch.csv", "r");
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
                    <div class="OneProduct"> <?php if($_SESSION["language"]== "EN") print ($arrayOfPieces[3]); else print($arrayOfPieces[7]) ?></div>
                    <div class="OneProduct"><?php if ($_SESSION["language"] == "EN") print($arrayOfPieces[4]);else print($arrayOfPieces[9]) ?></div>
                    <form method="POST">
                    <input type="hidden" name="bought" value="<?= $arrayOfPieces[1]?>">
                    <input type="hidden" name="euro" value="<?= $arrayOfPieces[2] ?>">
                    <input class="OneProduct" name="mybasket" type="submit" value=<?php if ($_SESSION["language"] == "EN") print($arrayOfPieces[8]); else print($arrayOfPieces[10]) ?>>
                    </form>
                    <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $Price=$_POST["euro"];
                    $name=$_POST["bought"];
                }
                ?>
                   
                
        <?php
            }
        }
        ?>
        <?php
            function basket($name,$Price){
            global $arrayOfPieces;
            $filebasket=fopen("basket.csv", "a");
            fwrite($filebasket, "\n". $name . ";" . $Price . ";");
            fclose($filebasket);
        }
        if(isset($_POST["mybasket"])){
            basket($_POST["bought"], $_POST["euro"]);
        }
        ?>
    </div>
  