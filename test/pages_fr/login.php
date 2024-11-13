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
            }
            else{
                print("password incorrect");
            }
        }
        else{
            print("Le nom d'utilisateur n'est pas dans la base de donné");
        }
    }

    ?>
    <br><a href="../pages/login.php">English</a>
    <h1>Login :</h1>

    <form method="POST">
    <input type="text" name="username" placeholder="Entrer nom d'utilisateur" />
    <input type="password" name="psw" placeholder=" Enter le password" />
    <input type="submit" value="login">
    </form>

    <?php
    // test replace:

    
    ?>
</body>
</html>