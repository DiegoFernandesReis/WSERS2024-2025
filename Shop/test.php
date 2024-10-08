<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel= "stylesheet" href="home.css"/>
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
</head>
<body>
    <p>Hello, and welcome to my page</p>
    

    <?php
    $a= "Hello world <br>";
    $firstname= "Diego ";
    $lastname= "Fernandes Reis";

    $name = $firstname . $lastname;
    for($i=0; $i<10;$i++){
     
    }
    $a= 10;
    $b= 2;

    $result= ($a/$b);
   

  print($a. "/". $b . "=". $result);


     for($i=0; $i<10; $i++){
        for ($j=0; $j <= $i; $j++){
            if(($i+$j) % 2 == 0){
                ?>
                <div class='box RedBox'></div>
                 <?php
            }
            else {
                ?>
                <div class='box GreenBox'></div>
                <?php
            }
           
        }
        print("<br>");
  }
    ?>
</body>
</html>