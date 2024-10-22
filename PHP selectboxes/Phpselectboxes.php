<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST["Username"])){
        print("Welcome". $_POST["Username"]);
    }
    ?>
    <h1>Login form</h1>
    <form method="POST" action="">
        Please enter your name: <input type="text name="UserName">
        Please enter your password : <input type="password" name="Password>
        <input type="submit" value="send">
    </form>
    <a href="Phpselectboxes.php">reset the page</a>
    <br>
    <a href="Phpselectboxes.php?Username=Dan">Go to Dan</a>
</body>
</html>