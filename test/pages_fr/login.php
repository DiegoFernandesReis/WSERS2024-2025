<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css?<?=time(); ?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("Commoncode.php");
     NavigationBar("login");



     if(isset($_POST["username"],$_POST["psw"])){
        if(userAlreadyExists($_POST["username"])){
            if(checkUsersPassword($_POST["username"], str_replace(";","#",$_POST["psw"]))){
                print("Ok, le password est correct");
                $_SESSION["UserLoggedIn"]=true;
                $_SESSION["User"]=$_POST["username"];
            }
            else{
                print("password incorrect");
            }
        }
        else{
            print("Le nom d'utilisateur n'est pas dans la base de donné");
        }
    }

    if (isset($SESSION["UserLoggedIn"])){
        ?>
        <h1>Logout</h1>
        <form method="POST">
            <input type="submit" value="Logout" name="Logout">
        </form>
        <?php

        // DISPLAY lOGOUT
    } else {
        ?>
        <h1>Login :</h1>

        <form method="POST">
        <input type="text" name="username" placeholder="Type your username" />
        <input type="password" name="psw" placeholder=" Enter a password" />
        <input type="submit" value="login">
        </form>
    <?php
    }
    ?>
</body>
</html>