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


    /*$myfile = fopen("orders.csv", "r");
    if ($myfile !== false) {

        while ($line = fgets($myfile)) {
            $arrayOfPieces[] = explode(";", $line);
        }
        fclose($myfile);
    }*/
    $host = "localhost";
    $username = "root";
    $psw = "";
    $dbName = "WSERS2PROJECT";

    $connection = mysqli_connect($host, $username, $psw, $dbName);
    $sqlselect = $connection->prepare("select * from Products natural join Orders");
    $sqlselect->execute();
    $result = $sqlselect->get_result();
    while ($row = $result->fetch_assoc()) {


        if (count($row) > 0) {
            $product_id=$row["ProductId"];
            $productname= $_SESSION["language"] == "EN" ? $row["ProductNameEN"] : $row["ProductNameFR"];
            $productPrice = $row["Price"];
            $image = $row["Image"];
            $buy = $row["buy"];
            $buyfr = $row["buyFR"];
            $date = $row["date"];
            

            $languageContent = ($_SESSION["language"] == "EN") ? $row["ProductNameEN"] : $row["ProductNameFR"];  // Check for language content
    
            // Output language-specific content
            echo "<div>" . $languageContent . "</div>";


            if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 2) {

                echo "<div class='Navcenter'>" . $row["username"] . "</div>";
            }


            echo "<div class='OneProduct'>" . print ($date) . "</div>";
        } else {
            echo "No data found in the file.";
        }

        /*$orderfile = fopen("Orders.csv", "r");
        while (!feof($orderfile)) {
            $file = fgets($orderfile);
            $pieces = explode(";", $file);
            if (count($pieces) >= 2) {
                print ("<br>" . $pieces[0] . " " . $pieces[1] . " " . $pieces[2]);
            }
        }
        */
    }
    ?>
</body>

</html>