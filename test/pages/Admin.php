<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css?<?=time(); ?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>Document</title>
</head>
<body>
    <?php 
    include_once("Commoncode.php");
    NavigationBar("Admin");

    function additems(){
        $itemsexists=false;
        $fileUsers=fopen("Accessories.csv","r");
        while(!feof($fileUsers)){
            $existingitem=fgets($fileUsers);
            $existingArrayForItems= explode(";", $existingitem);
            if($existingArrayForItems [0] == $_POST["item"]){
                $itemsexists=true;
                print("'".$existingArrayForItems[0]."' already exists");
                break;
            }
        }

        if(!$itemsexists){
            $add=fopen("Accessories.csv","a");
            fputs($add, "\n". $_POST["item"]);
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") { // Checks if a POST request was send to the server
        additems();
        }
        //Additional items
        //1;Wrist Strap;10,00;Material:plastic;inventory:15;wrist strap.jpeg


    ?>

    
   
    <form method="POST">
    <h1>Add Items:</h1>
    <input type="text" name="item" placeholder="Productid;ProductName;Price;Description;Count;Image" />
    <input type="submit" value="add"/>
    </form>

</body>
</html>