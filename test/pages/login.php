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
    NavigationBar("login");

    if (isset($_POST["Logout"])) {
        session_unset();
        session_destroy();
        header("Refresh:0");
    }



    if (isset($_POST["username"], $_POST["psw"])) {
        if (userAlreadyExists($_POST["username"])) {
            if (checkUsersPassword($_POST["username"], str_replace(";", "#", $_POST["psw"]))) {
                print ("Ok, your password is correct");
                $_SESSION["UserLoggedIn"]=true;
                $_SESSION["User"]=$_POST["username"];
                $_SESSION["usertype"]= ($_SESSION["User"]);
                
                header("Refresh:0");
            } else {
                print ($arrayofstrings["invalidpassword"]);
            }
        } else {
            print ($arrayofstrings["RegisterMessage"]);
        }
    }

    if ($_SESSION["UserLoggedIn"]) {
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
            <input type="text" name="username" placeholder="><?= $arrayofstrings["Typeusername"] ?>" />
            <input type="password" name="psw" placeholder="><?= $arrayofstrings["Enterpassword"] ?>" />
            <input type="submit" value="login">
        </form>
        <?php
    }
    ?>

</body>

</html>