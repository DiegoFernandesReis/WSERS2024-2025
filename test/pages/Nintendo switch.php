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
        /*
        $myFile = fopen("NintendoSwitch.csv", "r");
        $line = fgets($myFile);
        while (!feof($myFile)) {
            $line = fgets($myFile);
            $arrayOfPieces = explode(";", $line);
            //print("<div>" . $line . "</div>"); */

            $host = "localhost";
            $username = "root";
            $psw = "";
            $dbName = "WSERS2PROJECT";
    
            $connection = mysqli_connect($host, $username, $psw, $dbName);
            $sqlselect= $connection ->prepare("select * from Products where ProductType = 1 ");
            $sqlselect -> execute();
            $result= $sqlselect -> get_result();
            while($row=$result->fetch_assoc()){
                


            if (count($row) == 12) {

                $product_id=$row["ProductId"];
                $productname= $_SESSION["language"] == "EN" ? $row["ProductNameEN"] : $row["ProductNameFR"];
                $productPrice = $row["Price"];
                $image = $row["Image"];
                $buy = $row["buy"];
                $buyfr = $row["buyFR"];
 
        ?>
                 <div> <?=($_SESSION["language"] == "EN") ?$row["ProductNameEN"]:$row["ProductNameFR"] ?></div>
                    <?php  if(isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 2) {
                        
                        ?>
                        <div class="Navcenter"><?=$productname ?></div><?php
                    }
                    ?>
 
 
                
                    
                    <img src="../images/<?= $image ?>" width="400px">
                    <div class="OneProduct"> <?= $productPrice ?></div>
                    <div class="OneProduct"> <?php if($_SESSION["language"]== "EN") print ($row["Description"]); else print($row["Description"]) ?></div>
                    <div class="OneProduct"><?php if ($_SESSION["language"] == "EN") print($row["Count"]);else print($row["CountFR"]) ?></div>
                    <form method="POST">
                    <input type="hidden" name="bought" value="<?= $arrayOfPieces[1]?>">
                    <input type="hidden" name="euro" value="<?= $arrayOfPieces[2] ?>">
                    <input class="OneProduct" name="mybasket" type="submit" value=<?php if ($_SESSION["language"] == "EN") print($buy); else print($buyfr) ?>>
                    </form>
                    <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $Price=$_POST["euro"];
                    $name=$_POST["bought"];
                }
                if(!isset($_SESSION["cart"])){
                    $_SESSION["cart"]=[];
                }
            
                if(isset($_POST["mybasket"])){
                    array_push($_SESSION["cart"], $_POST["bought"],$_POST["euro"]);
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
  