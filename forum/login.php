<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <?php
    include_once("common.php");
  

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
                print ("Invalid password");
            }
        } else {
            print ("To Register fill the following form");
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
            <input type="text" name="username" placeholder="Type your username" />
            <input type="password" name="psw" placeholder="Enter a password" />
            <input type="submit" value="login">
        </form>
        <?php
    }
    ?>

</body>

</html>
</body>
</html>