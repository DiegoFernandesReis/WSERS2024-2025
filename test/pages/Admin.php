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

    
    ?>

   
    <form method="POST">
    <h1>Add Items:</h1>
    <input type="text" name="item" placeholder="Enter a Item" />
    <h1>Price:</h1>
    <input type="text" name="price" placeholder ="Enter a price"/>
    <h1>Description:</h1>
    <input type="text" name="description" placeholder="Enter a description"/>
    <input type="button" value="add"/>
    </form>

</body>
</html>