<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $_GET;

    $arrOfNames=[];
    $arrOfNames=["Durbaca"]="Dan";
    $arrOfNames=["Claude"]="Laura";
    $arrOfNames=["Ayash"]="Ayman";
    $arrOfNames=["Ahmadi"]="Abolo";

    $nameToSearch="Gilson";
    if(isset($arrOfNames[$nameToSearch])){
        print("The first name of ".$nameToSearch. "is" . $arrOfNames[$nameToSearch]);
    }
    else{
        print("There is no" . $nameToSearch. "in the array of Names");
    }

/*
    // DISPLAY tihs array :

    foreach($arrOfNames as &$value){
        $value=$value."is a student of 2TPIFI"; 
    }
    foreach($arrOfNames as $value){
        print($value. "<br>");
        }
        */
    ?>
</body>
</html>