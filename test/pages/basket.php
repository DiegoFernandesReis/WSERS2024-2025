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
    
    if(isset($_POST['Clear Button'])){
        $myFile=fopen("basket.csv", "w");
        fwrite($myfile, "list:");
        fclose($myFile);
    }
    ?>
    <div class="AllProducts">
        <?php
        if(!isset($_SESSION["cart"])){
            $_SESSION["cart"] = [];
        }
        if(isset($_POST["buy"])){
            array_push($_SESSION["cart"], $_POST["boughtitem"], $_POST["Price"])
            var_dump($_SESSION);
        }

       




        //$myFile = fopen("basket.csv" , "r");
        /*$line = fgets($myFile);
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
            
        }*/
        ?>
        <script>window.location=window.location.href</script>
        <form method="POST">
       <input type="submit" value="Clear Button" name="Clear Button">
       </form>
       
      
    
</body>
</html>