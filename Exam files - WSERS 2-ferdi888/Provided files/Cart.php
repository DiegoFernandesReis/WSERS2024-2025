<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Shop.css?1751290943" />
        <link rel="stylesheet" href="Shop-daybuild.css?1751290943" />
        <title>Welcome to the shop</title>
    </head>

    <body>
        <div class="NavCenter">
            <div class="NavBar">
                <div class="MainLinks">
                    <form method="POST">
                        <select name="category" onchange="this.form.submit()">
                            <option value="0">All Products</option>
                            <option value="5">Bakery</option>
                            <option value="3">Dairy</option>
                            <option value="2">Fruits</option>
                            <option value="4">Meat</option>
                            <option value="1">Vegetables</option>
                            
                        </select>
                    </form>
                    <div>
                    
                        <div class="CartCount">Items in cart: 12</div>
                    </div>
                    <a href="Cart.php" class="CartLink">Go to Cart</a>
                    <a class="CartLink" href="Products.php"> Products </a>
                </div>
                <div class="Icons">
                    <form method="POST">
                        <select name="theme" onchange="this.form.submit()">
                            <option value="light" selected>Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </form>

                    <form method="POST">
                        <input type="submit" value="Clear session" name="clear" />
                    </form>
                </div>
            </div>
        </div>
        <?php
        $host = "localhost";
        $username = "root";
        $psw = "";
        $dbName = "shopExam";

        $connection = mysqli_connect($host, $username, $psw, $dbName);
        

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["theme"])){
            if(isset($_POST["light"])){
            $datel = (int)date("H");
            if(date("H") > 7 or date("H") < 8){
                
            }
        }
        else if (isset($_POST["dark"])){
            $dated = (int)date("H");
        }
                

            // to clear the basket !!!
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["clear"])) {
                cart();
                $_SESSION["cart"] = [];
            }

        ?>
        <div class="Category">
            <h2>Bakery</h2>
            <p>Cart items in this category: 2</p>
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
                <tr>
                    <td>Bread</td>
                    <td>2</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td colspan="2">Total Price for Bakery:</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>

        <div class="Category">
            <h2>Dairy</h2>
            <p>Cart items in this category: 3</p>
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
                <tr>
                    <td>Milk</td>
                    <td>3</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td colspan="2">Total Price for Dairy:</td>
                    <td>6</td>
                </tr>
            </tbody>
        </table>

        <div class="Category">
            <h2>Fruits</h2>
            <p>Cart items in this category: 5</p>
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
                <tr>
                    <td>Orange</td>
                    <td>1</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Banana</td>
                    <td>4</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td colspan="2">Total Price for Fruits:</td>
                    <td>11</td>
                </tr>
            </tbody>
        </table>

        <div class="Category">
            <h2>Meat</h2>
            <p>Cart items in this category: 2</p>
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
                <tr>
                    <td>Beef</td>
                    <td>2</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td colspan="2">Total Price for Meat:</td>
                    <td>12</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
