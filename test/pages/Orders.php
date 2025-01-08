<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css?<?= time() ?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("orders");

    // Initialize the array to hold CSV data
    $arrayOfPieces = [];

   
    $myfile = fopen("orders.csv", "r");
    if ($myfile !== false) {
        
        while ($line = fgets($myfile)) {
            $arrayOfPieces[] = explode(";", $line); 
        }
        fclose($myfile);  
    }

    if (count($arrayOfPieces) > 0) {
     
        $languageContent = ($_SESSION["language"] == "EN") ? $arrayOfPieces[0][0] : (isset($arrayOfPieces[6]) ? $arrayOfPieces[6][0] : "");  // Check for language content

        // Output language-specific content
        echo "<div>" . $languageContent . "</div>";


        if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 2) {
        
            echo "<div class='Navcenter'>" . $arrayOfPieces[0][1] . "</div>";
        }

        
        echo "<div class='OneProduct'>" . $arrayOfPieces[0][2] . "</div>";  
    } else {
        echo "No data found in the file.";
    }
    $orderfile=fopen("Orders.csv", "r");
    while(!feof($orderfile)){
        $file=fgets($orderfile);
        $pieces=explode(";", $file);
        if(count($pieces) >= 2){
            print("<br>". $pieces[0] . " " .  $pieces[1] . " " . $pieces[2]);
        }
    }
    ?>
</body>
</html>