<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $carsArray = ["Volvo", "Saab", "Opel", "Audi", "BMW", "Dacia"];
    //$carsArrayAssoc = array("a" => "Ford", "b" => "Saab", "c"=> "Opel");

    if(isset($_POST["Username"]) && isset($_POST["cars"])){
        print("Welcome". $_POST["Username"]. "your favourite cars is". $_POST["cars"]);
    }
    ?>
    <h1>Login form</h1>
    <form method="POST">
        Please enter your name: <input type="text" name="Username" value="<?=$_POST["Username"]?>">
        Please enter your password : <input type="password" name="Password">

        <select name="cars">
            <?php
            foreach ($carsArray as $val){
                ?>
                 <option value="<?=$val?>"><?=$val?></option>
                <?php
            }
            ?>
           
        </select>
        <input type="submit" value="send">
    </form>
    <a href="Phpselectboxes.php">reset the page</a>
</body>
</html>