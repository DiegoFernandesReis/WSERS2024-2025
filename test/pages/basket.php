<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css?<?=time(); ?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("busket");
    

    if(isset($_SESSION["cart"])){
    foreach($_SESSION["cart"] as $basket){
        print $basket. "<br>";
    }
}else{
    print("No items in your basket");
}

function basket(){
    array_splice($_SESSION["cart"],0);
    header("Refresh:0");
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["Buy"])){
        basket();
    }
}

    ?>
    <form method="POST">
       <input type="submit" value="Buy" name="Buy">
       </form>


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