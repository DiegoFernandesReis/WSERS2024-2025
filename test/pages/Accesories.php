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
                   <form method="POST">
                   <input type="hidden" name="productid" value="<?= $arrayOfPieces[0]?>">
                    <input type="hidden" name="boughtitem" value="<?= $arrayOfPieces[1]?>">
                    <input type="hidden" name="Price" value="<?= $arrayOfPieces[2] ?>">
                   <input class="OneProduct" name="mybasket" type="submit" value=<?php if ($_SESSION["language"] == "EN") print($arrayOfPieces[8]); else print($arrayOfPieces[10]) ?>>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $Price=$_POST["Price"];
                    $name=$_POST["boughtitem"];
                }
                ?>
        <?php
            }
        }
        function basket($name, $Price){
            $filebasket=fopen("basket.csv", "a");
            fwrite($filebasket, "\n". $name . ";" . $Price . ";" . $TotalPrice);
            fclose($filebasket);
        }
        if(isset($_POST["mybasket"])){
            basket($_POST["boughtitem"], $_POST["Price"]);
        }
        if(!isset($_SESSION["cart"])){
            $_SESSION["cart"]=[];
        }
    
        $TotalPrice= 0;
        if(isset($_POST["mybasket"])){
            array_push($_SESSION["cart"], $_POST["boughtitem"], $_POST["Price"]);
            $TotalPrice+= $_POST["Price"];
        }
        ?>
        
    </div>
</body>
</html>