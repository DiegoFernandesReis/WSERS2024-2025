<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../style.css">
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
            if (count($arrayOfPieces) == 6) {
 
 
        ?>
 
 
                <div class="OneProduct">
                    <div> <?= $arrayOfPieces[1] ?></div>
                    <div> <?= $arrayOfPieces[2] ?></div>
                    <img src="./<?= $arrayOfPieces[5] ?>" width="100px">
                    <div> <?= $arrayOfPieces[3] ?></div>
                    <div>Inventory: <?= $arrayOfPieces[4] ?></div>
                </div>
        <?php
            }
        }
        ?>
    </div>
 
  </body>
<dl>
  <dd><a href="./Nintendo switch.php">Pro controller</a></dd>
  <dt><img src="../images/controller.jpeg"></dt>
</dl> 

<table>
  <caption>Pro controller</caption>
  <tr>
    <td>Price</td>
    <td>59,99€</td>
  </tr>

  <tr>
    <td>Condition</td>
    <td>Brand new</td>
  </tr>
 </table>

 <dl>
  <dt>The controller is brand new, the battery lasts a long time before it runs out </dt>
 </dl>


   