<?php
include_once "CommonCode.php";

if (count($_SESSION["cart"]) == 0) {
    header("Location: Products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='Shop.css?<?= time() ?>' />
    <link rel="stylesheet" href='<?= $_SESSION["theme"] == "light" ? "Shop-daybuild.css?" . time() : "Shop-nightbuild.css?" . time() ?>' />
    <title>Welcome to the shop</title>
</head>

<body>
    <?php
    $conn = getConnection();
    navBar();
    $sqlSelectCategories = $conn->prepare("SELECT * FROM Categories");
    $sqlSelectCategories->execute();
    $result = $sqlSelectCategories->get_result();
    while ($row = $result->fetch_assoc()) {
        $currentCategoryCountItems = 0;

        foreach ($_SESSION["cart"] as $productId => $quantity) {
            $sqlSelectProduct = $conn->prepare("SELECT * FROM ShopProducts WHERE productId = ?");
            $sqlSelectProduct->bind_param("i", $productId);
            $sqlSelectProduct->execute();
            $productResult = $sqlSelectProduct->get_result();
            if ($productRow = $productResult->fetch_assoc()) {
                if ($productRow["categoryId"] == $row["categoryId"]) {
                    $currentCategoryCountItems += $quantity;
                }
            }
        }

        if ($currentCategoryCountItems > 0) {
            $totalPrice = 0;
    ?>
            <div class='Category'>
                <h2><?= $row["categoryName"] ?></h2>
                <p>Cart items in this category: <?= $currentCategoryCountItems ?></p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION["cart"] as $productId => $quantity) {
                        $sqlSelectProduct = $conn->prepare("SELECT * FROM ShopProducts WHERE productId = ?");
                        $sqlSelectProduct->bind_param("i", $productId);
                        $sqlSelectProduct->execute();
                        $productResult = $sqlSelectProduct->get_result();
                        if ($productRow = $productResult->fetch_assoc()) {
                            if ($productRow["categoryId"] == $row["categoryId"]) {
                                $totalPrice += $productRow["Price"] * $quantity;
                    ?>
                                <tr>
                                    <td><?= $productRow["ProductName"] ?></td>
                                    <td><?= $quantity ?></td>
                                    <td><?= $productRow["Price"] * $quantity ?></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="2">Total Price for <?= $row["categoryName"] ?>:</td>
                        <td><?= $totalPrice ?></td>
                        <?php

                        ?>
                </tbody>
            </table>


    <?php
        }
    }
    ?>




</body>

</html>