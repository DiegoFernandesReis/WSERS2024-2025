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

    <h1>Add Items:</h1>
    <form method="POST">
    <input type="text" name="item" placeholder="Enter a Item" />
    <input type="button" value="add"/>
    </form>

</body>
</html>