<?php
session_start();

if (!isset($_SESSION["theme"])) {
    if ((int)date("H") > 7 && (int)date("H") < 20)
        $_SESSION["theme"] = "light";
    else
        $_SESSION["theme"] = "dark";
}
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

if (isset($_POST["productId"])) {
    $productId = $_POST["productId"];
    if (!isset($_SESSION["cart"][$productId])) {
        $_SESSION["cart"][$productId] = 1;
    } else {
        $_SESSION["cart"][$productId]++;
    }
}

if (!isset($_SESSION["category"])) {
    $_SESSION["category"] = 0; // Default category
}


if (isset($_POST["clear"])) {
    session_unset();
    session_destroy();
    header("Refresh:0");
    die("");
}

if (isset($_POST["theme"]))
    $_SESSION["theme"] = $_POST["theme"];
if (isset($_POST["category"]))
    $_SESSION["category"] = $_POST["category"];


function getConnection()
{
    $host = "localhost";
    $userName = "root";
    $psw = "";
    $dbName = "ShopExam";
    $conn = new mysqli($host, $userName, $psw, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function navBar()
{
    global $conn;
?>


    <div class="NavCenter">
        <div class="NavBar">
            <div class="MainLinks">
                <form method="POST">
                    <select name="category" onchange="this.form.submit()">
                        <option value="0">All Products</option>
                        <?php
                        $sqlSelectCategories = $conn->prepare("SELECT * FROM Categories");
                        $sqlSelectCategories->execute();
                        $result = $sqlSelectCategories->get_result();
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?= $row["categoryId"] ?>" <?= $_SESSION["category"] == $row["categoryId"] ? "selected" : "" ?>>
                                <?= $row["categoryName"] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </form>
                <div>
                    <?php
                    if (count($_SESSION["cart"]) > 0) {
                        echo "<div class='CartCount'>Items in cart: " . array_sum($_SESSION["cart"]) . "</div>";
                    } else {
                        echo "<div class='CartCount'>Cart is empty</div>";
                    }
                    ?>
                </div>
                <?php
                if (count($_SESSION["cart"]) > 0) {
                ?>
                    <a href="Cart.php" class="CartLink">Go to Cart</a>
                <?php
                }
                ?>
                <a class="CartLink" href="Products.php">
                    Products
                </a>
            </div>
            <div class="Icons">

                <form method="POST">
                    <select name="theme" onchange="this.form.submit()">
                        <option value="light" <?= $_SESSION["theme"] == "light" ? "selected" : "" ?>>Light</option>
                        <option value="dark" <?= $_SESSION["theme"] == "dark" ? "selected" : "" ?>>Dark</option>
                    </select>
                </form>

                <form method="POST">
                    <input type="submit" value="Clear session" name="clear">
                </form>


            </div>
        </div>
    </div>



<?php
}
