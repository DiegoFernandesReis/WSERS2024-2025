<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./style.css">
    <img src="./images/nintendo_banner.webp" id="image">
    <title>Homepage</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    include_once("Commoncode.php");
    NavigationBar("home");
    ?>
    <h1>Nintendo switch online shop</h1>

    <h2>The following products on sale</h2>

    <dl>
      <dd><a href="./pages/Controller.php">Pro controller</a></dd>
      <dt><img src="./images/controller.jpeg"></dt>
      <dd><a href="./pages/Nintendo switch.php">Nintendo switch</a></dd>
      <dt><img src="./images/Nintendo switch.jpg"></dt>
    </dl>
   <style>
        