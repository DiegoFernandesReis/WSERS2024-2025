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

    // Check if the cart exists and has items
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
        echo "Items in your basket:<br>";
        foreach ($_SESSION["cart"] as $productId) {
            echo $productId . "<br>";
        }
    } else {
        echo "No items in your basket.";
    }

    // Function to clear the cart and insert order into the database
    function basket() {
        $host = "localhost";
        $username = "root";
        $psw = "";
        $dbName = "WSERS2PROJECT";
        $currentTime = date("d-m-y h:i:s");
        $connection = mysqli_connect($host, $username, $psw, $dbName);

        // Insert order into the Orders table
        $sqlselect = $connection->prepare("INSERT INTO Orders(user_id, Date) VALUES(?, ?)");
        $sqlselect->bind_param("is", $_SESSION["id"], $currentTime);
        $sqlselect->execute();

        // Fetch the latest order_id
        $getnumstatement = $connection->prepare("SELECT Id FROM Orders ORDER BY Date DESC LIMIT 1");
        $getnumstatement->execute();
        $resultnum = $getnumstatement->get_result();
        $row3 = $resultnum->fetch_assoc();

        // Insert products into the order list
        foreach ($_SESSION["cart"] as $productId) {
            $statement2 = $connection->prepare("SELECT * FROM Products WHERE ProductId = ?");
            $statement2->bind_param("i", $productId);
            $statement2->execute();
            $result2 = $statement2->get_result();
            $product = $result2->fetch_assoc();

            // Insert product into orderlist
            $sqlinsert = $connection->prepare("INSERT INTO Order_list (product_id, price, ordersid, userid) VALUES (?, ?, ?, ?)");
            $sqlinsert->bind_param("iiii", $product["product_id"], $product["price"], $row3["order_id"], $_SESSION["id"]);
            $sqlinsert->execute();
        }

        // Clear the cart after processing
        $_SESSION["cart"] = [];
    }

    // Handle the Buy button click
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Buy"])) {
        basket();
        echo "<p>Your basket has been cleared and order placed!</p>";
    }
    ?>

    <form method="POST">
        <input type="submit" value="Buy" name="Buy">
    </form>
</body>
</html>