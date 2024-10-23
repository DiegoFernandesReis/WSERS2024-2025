<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
    <style>
        .AllProducts {
            display: flex;
            justify-content: space-around;
 
        }
 
        .OneProduct {
            border: 1px solid red;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
 
<body>
    <div class="AllProducts">
        <?php
        $myFile = fopen("Products.csv", "r");
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
 
</html>