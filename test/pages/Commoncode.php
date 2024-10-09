<?php
function NavigationBar ($buttontohighlight) {
    ?>
    <div class= "Navcenter">
        <div class= "Navbar">
            <div class = "Mainlinks">
    <a href="Home.php"<?php if ($buttontohighlight == "home"){
                                   print ("class='active'");
        
    } ?>>  >home</a>
    <a href="./Nintendo switch.php"Nintendo switch <?php if ($buttontohighlight == "nintendoswitch"){
                                   print ("class='active'");
        
    } ?>> >nintendoswitch</a>
    <a href="./Controller.php"Pro Controller <?php if ($buttontohighlight == "controller"){
                                   print ("class='active'");
        
    } ?>> >controller</a>
    </div>
         </div>
             </div>
        <?php
}
?>
