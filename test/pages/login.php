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



    if (isset($_POST["username"], $_POST["psw"])){
        if(userAlreadyExists($_POST["username"])){
            if(checkUsersPassword($_POST["username"], $_POST["psw"])){
                print("Your password is correct");
            }

        else{
            print("Your username already exists");
        }
    }
    }

    ?>

    <form method="POST">
    <input type="text" name="username" placeholder="Type your username" />
    <input type="password" name="psw" placeholder=" Enter a password" />
    <input type="submit" value="login">
    </form>
</body>
</html>