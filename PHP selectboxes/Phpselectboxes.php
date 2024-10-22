<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET["Username"])){
        print("Welcome". $_GET["Username"]);
    }
    ?>
    <form method="GET" action="">
        Please enter your name: <input type="text name="UserName">
        <input type="submit" value="send">
    </form>
    <a href="Phpselectboxes.php">reset the page</a>
    <br>
    <a href="Phpselectboxes.php?Username=Dan">Go to Dan</a>
</body>
</html>