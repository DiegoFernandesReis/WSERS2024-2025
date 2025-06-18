<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


    try{
        $link = mysqli_connect("localost","root","");

    } catch (Exception $e) {
        print("error db");
    }
      ?>
</body>
</html>