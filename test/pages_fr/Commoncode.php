<?php
function NavigationBar ($buttontohighlight) {
    ?>
    <div class= "Navcenter">
        <div class= "Navbar">
            <div class = "Mainlinks">
    <a href="Home.php"Home<?php if ($buttontohighlight == "home"){
                                   print ("class='active'");
        
    } ?>>Accueil</a>
    <a href="Nintendo switch.php"Nintendo switch <?php if ($buttontohighlight == "nintendoswitch"){
                                   print ("class='active'");
        
    } ?>>Nintendoswitch</a>
    <a href="Controller.php"Pro Controller <?php if ($buttontohighlight == "controller"){
                                   print ("class='active'");
        
    } ?>>Manette</a>
    <a href="Accesories.php"Accesories <?php if ($buttontohighlight == "Accesories"){
                                   print ("class='active'");
        
    } ?>>Accessories</a>
     <a href="Register.php"Accesories <?php if ($buttontohighlight == "Register"){
                                   print ("class='active'");
        
    } ?>>Inscription</a>
    <a href="login.php"Accesories <?php if ($buttontohighlight == "login"){
                                   print ("class='active'");
        
    } ?>>Connection</a>


    </div>
         </div>
             </div>
        <?php
}
?>
    <?php

     function userAlreadyExists($checkUser) {
        $fileUsers = fopen("Clients.csv", "r");
        while (!feof($fileUsers)) {
            $existingUser= fgets($fileUsers);
            $existingArrayForUser = explode(";", $existingUser);
            if ($existingArrayForUser [0] == $checkUser){
              return true;
            }
            
        }
        return false;
    }
function checkUsersPassword($givenUser, $givenPassword){
    $fileUsers = fopen("Clients.csv", "r");
    while (!feof($fileUsers)) {
        $existingUser = fgets($fileUsers);
        $existingArrayForUser = explode(";", $existingUser);
        //var_dump($existingArrayForUser); // debuggin instruction !!!
        //print("<br>");
        if ($existingArrayForUser [0] == $givenUser){
            if($existingArrayForUser[1] == $givenPassword){
                return true;
            }
            else{
                return false;
            }
          
        }
        
    }
    return false;
}