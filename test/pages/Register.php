<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css?<?=time()?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if(isset($_POST["username"], $_POST["psw"] , $_POST["pswAgain"])){
        print("Registration in process...");
        if($_POST["psw"] == $_POST["pswAgain"]) {
            $fileUsers= fopen("Clients.csv","a");
            fputs($fileUsers, "\n" . $_POST["username"] . ";" . $_POST["psw"] );
        } else {
            print("Password do not match. Please try again !");
        }
    }
     include_once("Commoncode.php");
     NavigationBar("Register");
    ?>

    <h1>To Register, please fill in the following form: </h1>

    <form method="POST">
    <input type="text" name="username" placeholder="Enter your username" />
    <input type="password" name="psw" placeholder="Please choose a password" />
    <input type="password" name="pswAgain" placeholder="Please type the password" />
    <input type="submit" value="Create account">
</form>
</body>
</html>