<?php

session_start(); //start the session !
// we just created and have at our dispusal a new ARRAY:
// $_SESSION
// we need to store a BOOLEAN value that tells us if the user is LOGGED IN OR NOT !
if(!isset($_SESSION["UserLoggedIn"])){
    $_SESSION["UserLoggedIn"] = false;
    // mark as USER NOT LOGGED IN BY DEFAULT!!
}



function NavigationBar ($buttontohighlight) {
    ?>
    <div class= "Navcenter">
        <div class= "Navbar">
            <div class = "Mainlinks">
    <li><a href="Home.php"Home<?php if ($buttontohighlight == "home"){
                                   print ("class='active'");
        
    } ?>>Home</a></li>
    <li><a href="Nintendo switch.php"Nintendo switch <?php if ($buttontohighlight == "nintendoswitch"){
                                   print ("class='active'");
        
    } ?>>Nintendoswitch</a></li>
    <li><a href="Controller.php"Pro Controller <?php if ($buttontohighlight == "controller"){
                                   print ("class='active'");
        
    } ?>>Controller</a></li>
    <li><a href="Accesories.php"Accesories <?php if ($buttontohighlight == "Accesories"){
                                   print ("class='active'");
        
    } ?>>Accesories</a></li>
     <li><a href="Register.php"Accesories <?php if ($buttontohighlight == "Register"){
                                   print ("class='active'");
        
    } ?>>Register</a></li>
    <li><a href="login.php"Accesories <?php if ($buttontohighlight == "login"){
                                   print ("class='active'");
        
    } ?>><?php if ($_SESSION["UserLoggedIn"]) { print("login"); 
    } 
    else { print("log-out");}?></a></li>

<?php //var_dump($_SESSION);
            if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 1) {
                echo "<li><a href='Admin.php'";
                if ($buttonToHighlight == "admin") print("class='active'");
                echo ">Admin</a></li>";
            } ?>
    
     <li><a href="../pages_fr/Home.php">francais</a></li>

     <div class="Icons">
        <div><?php if($_SESSION["UserLoggedIn"]){
            print("Welcome" . $_SESSION["User"]);
        }
        else{
            print("unknown user");
        }
        ?>
        </div>
    </div>
    </div>
    </div>
    </div>
        <?php
}
?>
    <?php
    function type($user){
        if(!userAlreadyExists($user)){
            return 0;
        }
        $fileUsers = fopen("Clients.csv", "r");
        while (!feof($fileUsers)) {
            $existingUser= fgets($fileUsers);
            $existingArrayForUser = explode(";", $existingUser);
            if($existingArrayForUser [0] == $user){
                return $existingArrayForUser [2];
            }
            
            
        }
    }
     function userAlreadyExists($checkUser) {
        $fileUsers = fopen("Clients.csv", "r");
        while (!feof($fileUsers)) {
            $existingUser= fgets($fileUsers);
            $existingArrayForUser = explode(";", $existingUser);
            if($existingArrayForUser [0] == "Administrator"){
                $_SESSION["Administrator"] = true;
            }
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

