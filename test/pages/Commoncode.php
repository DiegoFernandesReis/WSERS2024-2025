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
     <a href="Register.php"Accesories <?php if ($buttontohighlight == "Register"){
                                   print ("class='active'");
        
    } ?>>Register</a>
    <a href="login.php"Accesories <?php if ($buttontohighlight == "login"){
                                   print ("class='active'");
        
    } ?>>login</a>


    </div>
         </div>
             </div>
        <?php
}
?>
    <?php

     function userAlreadyExists($checkUser) {
        $myfile = fopen("Clients.csv", "r");
        while (!feof($myfile)) {
            $linestring = fgets($myfile);
            $linearray = explode(";", $linestring);
            if ($linearray [0] == $checkUser){
              return true;
            }
            
        }
        return false;
    }
function checkUsersPassword($givenUser, $givenPassword){
    $myfile = fopen("Clients.csv", "r");
    while (!feof($myfile)) {
        $linestring = fgets($myfile);
        $linearray = explode(";", $linestring);
        if ($linearray [0] == $givenUser){
            if($linearray[1] == $givenPassword){
                return true;
            }
            else{
                return false;
            }
          
        }
        
    }
    return false;
}
