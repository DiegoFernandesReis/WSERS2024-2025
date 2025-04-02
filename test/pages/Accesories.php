<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css?<?= time() ?>">
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
        $host = "localhost";
        $username = "root";
        $psw = "";
        $dbName = "WSERS2PROJECT";

        $connection = mysqli_connect($host, $username, $psw, $dbName);
        $sqlselect= $connection ->prepare("select * from Products where ProductType = 3 ");
        $sqlselect -> execute();
        $result= $sqlselect -> get_result();
        while($row=$result->fetch_assoc()){
            
        /*$myFile = fopen("Accessories.csv", "r");
        $line = fgets($myFile);
        while (!feof($myFile)) {
            $line = fgets($myFile);
            $arrayOfPieces = explode(";", $line);
            print("<div>" . $line . "</div>");*/

 
            if (count($row) == 12) {

                $product_id=$row["ProductId"];
                $productname= $_SESSION["language"] == "EN" ? $row["ProductNameEN"] : $row["ProductNameFR"];
                $productPrice = $row["Price"];
                $image = $row["Image"];
                $buy = $row["buy"];
                $buyFR = $row["buyFR"];

                ?>



                <div>
                    <?= ($_SESSION["language"] == "EN") ? $row["ProductNameEN"] : $row["ProductNameFR"] ?>
                </div>
                <?php if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 2) {

                    ?>
                    <div class="Navcenter">
                        <?=$buy?>
                    </div>
                    <?php
                }
                ?>
                <img src="../images/<?= $image ?>" width="400px">
                <div class="OneProduct">
                    <?= print($productPrice) ?>
                </div>
                <div class="OneProduct">
                    <?php if ($_SESSION["language"] == "EN")
                        print ($row["Description"]);
                    else
                        print ($row["DescriptionFR"]) ?>
                    </div>
                    <div class="OneProduct">
                    <?php if ($_SESSION["language"] == "EN")
                        print ($row["Count"]);
                    else
                        print ($row["countFR"]) ?>
                    </div>
                    <form method="POST">
                        <input type="hidden" name="productid" value="<?= print ($product_id) ?>">
                    <input type="hidden" name="boughtitem" value="<?= print ($productname) ?>">
                    <input type="hidden" name="Price" value="<?=  print $buy ?>">
                    <input class="OneProduct" name="mybasket" type="submit" value=<?php if ($_SESSION["language"] == "EN")
                        print ($buy);
                    else
                        print ($buyFR) ?>>
                    </form>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $Price = $_POST["Price"];
                        $name = $_POST["boughtitem"];
                    }
                    ?>
                <?php
            }
        }

        
        function basket($name, $Price)
        {
            $TotalPrice = 0;
            $filebasket = fopen("basket.csv", "a");
            fwrite($filebasket, "\n" . $name . ";" . $Price . ";" . $TotalPrice);
            fclose($filebasket);
        }
        if (isset($_POST["mybasket"])) {
            basket($_POST["boughtitem"], $_POST["Price"]);
        }
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        
        if (isset($_POST["mybasket"])) {
            array_push($_SESSION["cart"], $_POST["boughtitem"], $_POST["Price"]);
            $TotalPrice += $_POST["Price"];
        }
        ?>

    </div>
</body>

</html>