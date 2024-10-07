<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <style>
          p {
            background-color: lightblue;
        }
         .box {

 display: inline-block;
            margin: 5px;

 }

 .RedBox {
 width: 10px;

height: 10px;

 background-color: red;

}

.GreenBox {

width: 10px;

 height: 10px;
 background-color: green;

 }
    </style>

    <?php
     for($i=0; $i<=10; $i++){
        for($y=0; $y<=$i; $y++ ) {
            print("<div class='box Redbox'></div>");
            print("<div class='box Greenbox></div>");
        }
        print ("<br>");
     }
    ?>
</body>
</html>