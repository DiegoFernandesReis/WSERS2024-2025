<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../style.css?<?= time(); ?>">
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

    $host = "localhost";
    $username = "root";
    $psw = "";
    $dbName = "WSERS2PROJECT";

    $connection = mysqli_connect($host, $username, $psw, $dbName);
    $sqlselect = $connection->prepare("select * from Products where ProductType = 2 ");
    $sqlselect->execute();
    $result = $sqlselect->get_result();
    while ($row = $result->fetch_assoc()) {
     
      if (count($row) == 12) {

        $product_id=$row["ProductId"];
        $productname= $_SESSION["language"] == "EN" ? $row["ProductNameEN"] : $row["ProductNameFR"];
        $productPrice = $row["Price"];
        $image = $row["Image"];
        $buy = $row["buy"];
        $buyfr = $row["buyFR"];

        ?>



        <div>
          <?= $productname ?>
        </div>
        <img src="../images/<?= $image ?>" width="400px">
        <div class="OneProduct">
          <?= print($productPrice) ?>
        </div>
        <div class="OneProduct">
          <?= $_SESSION["language"] == "EN" ? $row["Description"] : $row["DescriptionFR"] ?>
        </div>
        <div class="OneProduct">
          <?php if ($_SESSION["language"] == "EN")
            print ($row["Count"]);
          else
            print ($row["countFR"]) ?>
          </div>
          <form method="POST">
            <input type="hidden" name="item" value="<?= print ($product_id) ?>">
          <input type="hidden" name="money" value="<?= print($productname) ?>">
          <input class="OneProduct" name="mybasket" type="submit" value=<?php if ($_SESSION["language"] == "EN")
            print ($buy);
          else
            print ($buyfr) ?>>
          </form>

          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Price = $_POST["money"];
            $name = $_POST["item"];
          }
          ?>
        <?php
      }
    }
    ?>
    <?php
    function basket($name, $Price)
    {
      global $arrayOfPieces;
      $filebasket = fopen("basket.csv", "a");
      fwrite($filebasket, "\n" . $name . ";" . $Price . ";");
      fclose($filebasket);
    }
    if (isset($_POST["mybasket"])) {
      basket($_POST["item"], $_POST["money"]);
    }
    if (!isset($_SESSION["cart"])) {
      $_SESSION["cart"] = [];
    }

    if (isset($_POST["mybasket"])) {
      array_push($_SESSION["cart"], $_POST["item"], $_POST["money"]);
    }
    ?>
  </div>

</body>