<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css?<?= time(); ?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("busket");

    
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
        echo "Items in your basket:<br>";
        foreach ($_SESSION["cart"] as $basket) {
            echo $basket . "<br>";
        }
    } else {
        echo "No items in your basket.";
    }

    // Function to clear the cart
    function basket() {
        $Timestamp=date("y-m-d h:i:s");
        $fileorder=fopen("Orders.csv", "a");
        foreach($_SESSION["cart"] as $cart){
            fwrite($fileorder, $cart . ";" . $_SESSION["User"] . ";" . " " .  $Timestamp);
        }
        fclose($fileorder);
        $_SESSION["cart"] = []; 
        echo "<p>Your basket has been cleared.</p>"; 
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["Buy"])) {
            basket();  
        }
    }

    ?>
    
    <form method="POST">
        <input type="submit" value="Buy" name="Buy">
    </form>
</body>
</html>


    <!--To make html comment-->
    <div class="AllProducts">
        <?php
        // To make php comment
        /* To make a php comment with start and ending */
        /*$myFile = fopen("basket.csv" , "r");
        $line = fgets($myFile);
        while (!feof($myFile)) {
            $line = fgets($myFile);
            $arrayOfPieces = explode(";", $line);
            //print("<div>" . $line . "</div>");
            if (count($arrayOfPieces) == 3) {
 
        ?>
    
       
                    <div> <?=($_SESSION["language"] == "EN") ?$arrayOfPieces[0]:$arrayOfPieces[6] ?></div>
                    <?php  if(isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 2) {
                        
                        ?>
                        <div class="Navcenter"><?=$arrayOfPieces[0] ?></div><?php
                    }
                    ?>
                    <div class="OneProduct"><?=$arrayOfPieces[1] ?></div>

                <?php
            }
        }
        fclose($myFile);
        */
        ?>
        
       
    
</body>
</html>