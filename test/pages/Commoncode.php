<?php

session_start(); //start the session !
// we just created and have at our dispusal a new ARRAY:
// $_SESSION
// we need to store a BOOLEAN value that tells us if the user is LOGGED IN OR NOT !
if(!isset($_SESSION["UserLoggedIn"])){
    $_SESSION["UserLoggedIn"] = false;
    // mark as USER NOT LOGGED IN BY DEFAULT!!
}

if(!isset($_SESSION["language"])){
    $_SESSION["language"] = "EN"; // english language by default
}
if(isset($_GET["language"])){
    $_SESSION["language"] = $_GET["language"];
}

$arrayofstrings=[];
$fileTranslation=fopen("translation.csv","r");
$line=fgets($fileTranslation);
while(!feof($fileTranslation)){
    $line=fgets($fileTranslation);
    $arrayofpieces = explode(";",$line);
    if(count($arrayofpieces)==3) {
        if($_SESSION["language"]== "EN"){
            $arrayofstrings[$arrayofpieces[0]] = $arrayofpieces[0];
        }
        else {
            $arrayofstrings[$arrayofpieces[0]] = $arrayofpieces[1];
        }
    }
}



function NavigationBar ($buttontohighlight) {
    global $arrayofstrings;
    ?>
    <div class= "Navcenter">
        <div class= "Navbar">
            <div class = "Mainlinks">
    <li><a href="Home.php"Home<?php if ($buttontohighlight == "Home"){
                                   print ("class='active'");
        
    } ?>><?=$arrayofstrings["Home"]?></a></li>
    <li><a href="Nintendo switch.php"Nintendo switch <?php if ($buttontohighlight == "Nintendoswitch"){
                                   print ("class='active'");
        
    } ?>><?=$arrayofstrings["Nintendoswitch"]?></a></li>
    <li><a href="Controller.php"Pro Controller <?php if ($buttontohighlight == "Controller"){
                                   print ("class='active'");
        
    } ?>><?=$arrayofstrings["Controller"]?></a></li>
    <li><a href="Accesories.php"Accesories <?php if ($buttontohighlight == "Accesories"){
                                   print ("class='active'");
        
    } ?>><?=$arrayofstrings["Accessories"]?></a></li>
    <?php if(!$_SESSION["UserLoggedIn"]){
        ?>
        <li><a href="Register.php"Accesories <?php if ($buttontohighlight == "Register"){
                                   print ("class='active'");
        
    } ?>><?=$arrayofstrings["Register"]?></a></li>
    <?php
    }
    ?>
     
    <li><a href="login.php"Accesories <?php if ($buttontohighlight == "login"){
                                   print ("class='active'");
        
    } ?>><?php if ($_SESSION["UserLoggedIn"]) { print($arrayofstrings["log-out"]); 
    } 
    else { print($arrayofstrings["login"]);}?></a></li>

<?php //var_dump($_SESSION);
            if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == 1) {
                echo "<li><a href='Admin.php'";
                if ($buttontohighlight == "Admin") print("class='active'");
                ?>
                ><?=$arrayofstrings["Admin"]?></a></li>
                <?php
            } ?>
    <form>
    <select name="language" onchange="this.form.submit()">
        <option value="EN" <?=$_SESSION["language"]== "EN" ? "selected" : ""?>>English</option>
        <option value="FR" <?=$_SESSION["language"]== "FR" ? "selected" : ""?>>French</option>
    </select>
    </form>

     <div class="Icons">
        <div><?php if($_SESSION["UserLoggedIn"]){
            print($arrayofstrings["Welcome"] . " ". $_SESSION["User"]);
        }
        else{
            print($arrayofstrings["NoUser"]);
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


