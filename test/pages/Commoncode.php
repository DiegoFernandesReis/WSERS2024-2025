<?php
function NavigationBar ($buttontohighlight) {
    ?>
    <div class= "Navcenter">
        <div class= "Navbar">
            <div class = "Mainlinks">
    <a href="Home.php"Home<?php if ($buttontohighlight == "home"){
                                   print ("class='active'");
        
    } ?>>Home</a>
    <a href="Nintendo switch.php"Nintendo switch <?php if ($buttontohighlight == "nintendoswitch"){
                                   print ("class='active'");
        
    } ?>>Nintendoswitch</a>
    <a href="Controller.php"Pro Controller <?php if ($buttontohighlight == "controller"){
                                   print ("class='active'");
        
    } ?>>Controller</a>
    <a href="Accesories.php"Accesories <?php if ($buttontohighlight == "Accesories"){
                                   print ("class='active'");
        
    } ?>>Accesories</a>
    </div>
         </div>
             </div>
        <?php
}
?>
