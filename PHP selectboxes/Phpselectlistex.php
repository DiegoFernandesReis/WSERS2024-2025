<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $arraycolor=["red","green","blue"];
    ?>


<form method="POST">
<select name="color">
<?php
            foreach ($arraycolor as $val){
                ?>
                 <option value="<?=$val?>"<?php if(isset($_POST["color"])){
                    if($_POST["color"] == $val){
                        print("selected='selected'");
                    }
                 }?>><?=$val?></option>
                <?php
            }
            ?>

</select>
<input type="submit" value="send"> 
</form>
<?php 
            if(isset($POST["color"])){
                print("You selected". $POST["color"]);
            }
            else {
                print("You must select something");
            }

            ?>
</body>
</html>