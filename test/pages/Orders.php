<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css?<?=time()?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("orders");

    function orders(){
        $time=date("d-m-y");
        $myFile = fopen("Orders.csv" , "r");
        $line = fgets($myFile);
        while (!feof($myFile)) {
            $line = fgets($myFile);
            $arrayOfPieces = explode(";", $line);
            //print("<div>" . $line . "</div>");
            if (count($arrayOfPieces) == 3) {
    }
  

    ?>
      <div> <?=($_SESSION["language"] == "EN") ?$arrayOfPieces[0]:$arrayOfPieces[6] ?></div>
                    <?php  if(isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 2) {
                        
                        ?>
                        <div class="Navcenter"><?=$arrayOfPieces[1] ?></div><?php
                    }
                    ?>
                    <div class="OneProduct"><?=$arrayOfPieces[2] ?></div>
                    <?php
        }
    }
                    ?>
                
                
</body>
</html>