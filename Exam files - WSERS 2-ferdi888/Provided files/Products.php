<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Shop.css?1751290912" />
        <link rel="stylesheet" href="Shop-daybuild.css?1751290912" />
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

        <div class="WelcomeText">
            <h1>Welcome to the shop</h1>
            <p>Here you can find a variety of products.</p>
        </div>

        <div class="AllProducts">
            <div class="OneProduct">
                <div>Potato</div>
                <div>2 EUR</div>
                <img src=".\images\Potato.jpg" />

                <div>Inventory: 100</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="1" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Apple</div>
                <div>3 EUR</div>
                <img src=".\images\Apple.jpg" />

                <div>Inventory: 50</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="2" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Milk</div>
                <div>2 EUR</div>
                <img src=".\images\Milk.jpg" />

                <div>Inventory: 200</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="3" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Chicken</div>
                <div>5 EUR</div>
                <img src=".\images\Chicken.jpg" />

                <div>Inventory: 30</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="4" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Bread</div>
                <div>1 EUR</div>
                <img src=".\images\Bread.jpg" />

                <div>Inventory: 150</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="5" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Carrot</div>
                <div>3 EUR</div>
                <img src=".\images\Carrot.jpg" />

                <div>Inventory: 80</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="6" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Banana</div>
                <div>2 EUR</div>
                <img src=".\images\Banana.jpg" />

                <div>Inventory: 60</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="7" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Cheese</div>
                <div>4 EUR</div>
                <img src=".\images\Cheese.jpg" />

                <div>Inventory: 40</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="8" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Beef</div>
                <div>6 EUR</div>
                <img src=".\images\Beef.jpg" />

                <div>Inventory: 20</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="9" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Croissant</div>
                <div>2 EUR</div>
                <img src=".\images\Croissant.jpg" />

                <div>Inventory: 100</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="10" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Spinach</div>
                <div>2 EUR</div>
                <img src=".\images\Spinach.jpg" />

                <div>Inventory: 90</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="11" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Orange</div>
                <div>3 EUR</div>
                <img src=".\images\Orange.jpg" />

                <div>Inventory: 70</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="12" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Yogurt</div>
                <div>2 EUR</div>
                <img src=".\images\Yogurt.jpg" />

                <div>Inventory: 120</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="13" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Pork</div>
                <div>6 EUR</div>
                <img src=".\images\Pork.jpg" />

                <div>Inventory: 25</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="14" />
                    <input type="submit" value="Add to cart" />
                </form>
            </div>

            <div class="OneProduct">
                <div>Baguette</div>
                <div>2 EUR</div>
                <img src=".\images\Baguette.jpg" />

                <div>Inventory: 110</div>
                <form method="POST">
                    <input type="hidden" name="productId" value="15" />
                    <input type="submit" value="Add to cart" />
                </form>
                <?php
                 function productsCHECK($checkproducts){    // to display the products 
                    global $conn;
                    $sqlselect = $conn -> prepare("select * from ShopProducts where ProductName = ?");
                    $sqlselect -> bind_param("s", $checkproducts);
                    $sqlselect -> execute();
                    $result = $sqlselect -> get_result();
                    return $result -> num_rows >


                if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                    echo "Items in your basket:<br>";
                    foreach ($_SESSION["cart"] as $productId) {
                        echo $productId . "<br>";
                    }
                } else {
                    echo "No items in your basket.";
                }
    
                function cart() {
                    $host = "localhost";
                    $username = "root";
                    $psw = "";
                    $dbName = "ShopExam";
                    $connection = mysqli_connect($host, $username, $psw, $dbName);
            
                    
                    $sqlselect = $connection->prepare("INSERT INTO ShopProducts(ProductsId) VALUES(?)");
                    $sqlselect->bind_param("i", $_SESSION["Id"]);
                    $sqlselect->execute();
            
                    $getnumstatement = $connection->prepare("SELECT ProductsId FROM ShopProducts ");
                    $getnumstatement->execute();
                    $resultnum = $getnumstatement->get_result();
                    $row3 = $resultnum->fetch_assoc();
            
                    
                    foreach ($_SESSION["cart"] as $productId) {
                        $statement2 = $connection->prepare("SELECT * FROM ShopProducts WHERE ProductId = ?");
                        $statement2->bind_param("i", $productId);
                        $statement2->execute();
                        $result2 = $statement2->get_result();
                        $product = $result2->fetch_assoc();
            
                        
                        $sqlinsert = $connection->prepare("INSERT INTO ShopProducts (productId, ProductName, Price, Inventory, ImageLink, categoryId) VALUES (?, ?, ?, ?, ?, ?)");
                        $sqlinsert->bind_param("iiiiii", $product["ProductId"], $product["ProductName"], $product["Price"], $Product["Inventory"], $Product["ImageLink"], $row3["Productsid"], $_SESSION["Id"]);
                        $sqlinsert->execute();
                    }
                    header("refresh:0");
                }
                function total(){
                    $sum=0;
                    $count=0;
                        if(count($product["ProductName"]) > 0){
                            $count++;
                            $number=(int)$product["Price"];
                            $sum += $number;
                        }
                    return $sum /$count;
                }
                ?>
            </div>
        </div>
    </body>
</html>
