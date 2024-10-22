<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Please fill in the following</h1>

    <?php
    if(isset($_GET["result"]) && isset($_GET["result1"])){
        print ("That is the Result :".($_GET["result"]) + ($_GET["result1"]));
    }
    ?>
    <form action="" method="GET">
        <div>Please type your name:</div>
        <input type="number" placeholder="Type a number" name="result">
        <input type="number" placeholder="Type a second" name="result1">
        <input type="submit" value="send data">    
    </form>
</body>
</html>
