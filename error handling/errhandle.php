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

        // go on here - it is safe, the database server is WORKING
        print("No, errors the database is working properly");
    } catch (Exception $e) {
        print("error database is not started");
    }
    
      ?>
</body>
</html>