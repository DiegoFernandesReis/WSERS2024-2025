<?php
include_once "CommonCode.php";
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
    ?>

    <div class="WelcomeText">
        <h1>Welcome to the shop</h1>
        <p>Here you can find a variety of products.</p>
    </div>

    <div class="AllProducts">
        <?php
        if ($_SESSION["category"] == 0) {
            $sqlSelectProducts = $conn->prepare("SELECT * from ShopProducts");
        } else {
            $sqlSelectProducts = $conn->prepare("SELECT * from ShopProducts WHERE categoryId = ?");
            $sqlSelectProducts->bind_param("i", $_SESSION["category"]);
        }

        $sqlSelectProducts->execute();
        $result = $sqlSelectProducts->get_result();
        if ($result->num_rows == 0) {
            echo "<h2>No products found in this category.</h2>";
        }
        while ($row = $result->fetch_assoc()) {
        ?>

            <div class="OneProduct">
                <div><?= $row["ProductName"] ?></div>
                <div><?= $row["Price"] ?> EUR</div>
                <img src=".\images\<?= $row["ImageLink"] ?>">

                <div>Inventory: <?= $row["Inventory"] ?></div>
                <form method="POST">
                    <input type="hidden" name="productId" value="<?= $row["productId"] ?>">
                    <input type="submit" value="Add to cart">
                </form>

            </div>
        <?php
        }
        ?>
    </div>


</body>

</html>