<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 
<body>
    <h1>Put a number between 0 and 100</h1>
 
    <?php
    if (isset($_GET["integer"])) {
        $number = $_GET["integer"];
        if (($number % 2) == 0) {
            print("Well done, you have picked an even number ");
        } 
        
        else {
            print("Not a good number, please pick another one");
    ?>
 
            <form action="" method="GET">
                <input type="number" placeholder="Your number" name="integer"><br/></br>
                <input type="submit" value="Send data">
            <?php
        }
    } 
    else {
            ?>
 
            <form action="" method="GET">
                <div>Enter a number</div><br />
                <input type="number" placeholder="Your number" name="integer"><br /></br>
                <input type="submit" value="Send data">
 
 
            <?php
        }
            ?>