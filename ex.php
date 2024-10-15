<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $a=[];
    $array_push($a,10,20,30);
    $array_pop($a);
    for($i=0; $i<count($a);$i++){
        print($a);
    }
    ?>
</body>
</html>