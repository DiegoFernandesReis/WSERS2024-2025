<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css?<?=time(); ?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>Document</title>
</head>
<body>
    <?php 
    include_once("CommnonCode.php");
    NavigationBar("Admin")
    ?>

    <h1>Add Items:</h1>
    <br>Add Items:<input type="text">
    <button type="button">Add</button>

</body>
</html>