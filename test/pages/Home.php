<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../style.css">
    <img src="../images/nintendo_banner.webp" id="image">
    <title>Homepage</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("home");
    ?>
      
    <h1><?=$arrayofstrings["WelcomeMessage"]?></h1>


    <h2><?=$arrayofstrings["followingproducts"]?></h2>

    <dl>
      <dd><a href="Controller.php"><?=$arrayofstrings["Controller"]?></a></dd>
      <dt><img src="../images/controller.jpeg"></dt>
      <dd><a href="Nintendo switch.php"><?=$arrayofstrings["Nintendoswitch"]?></a></dd>
      <dt><img src="../images/Nintendo switch.jpg"></dt>
      <dd><a href="Accesories.php"><?=$arrayofstrings["Accesories"]?></a></dd>
      <dt><img src="../images/accessories.jpeg" width="400 px"></dt>
    </dl>
    
   <style>
        