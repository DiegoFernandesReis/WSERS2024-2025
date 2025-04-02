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


/*$fileTranslation=fopen("translation.csv","r");
$line=fgets($fileTranslation);
while(!feof($fileTranslation)){
    $line=fgets($fileTranslation);
    $arrayofpieces = explode(";",$line);
    if(count($arrayofpieces)==3) {
        if($_SESSION["language"]== "EN"){
            $arrayofstrings[$arrayofpieces[0]] = $arrayofpieces[1];
        }
        else {
            $arrayofstrings[$arrayofpieces[0]] = $arrayofpieces[2];
        }
    }
}*/

$host = "localhost";
$username = "root";
$psw = "";
$dbName = "WSERS2PROJECT";

//step 1
$connection = mysqli_Connect($host, $username, $psw, $dbName);

$arrayofstrings=[];
$sqlSelect = $connection->prepare("SELECT * FROM translations");
$sqlSelect->execute();
$result = $sqlSelect->get_result();
while ($row = $result->fetch_assoc()) {
    $row['ID'];
    if (count($row) == 3) {
        if ($_SESSION["language"] == "EN")
            $arrayofstrings[$row['ID']] = $row['ENText'];
        else
            $arrayofstrings[$row['ID']] = $row['FRText'];
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


     <li><a href="basket.php" basket<?php if ($buttontohighlight == "basket"){
                                   print ("class='active'");
        
    } ?>><?=$arrayofstrings["Basket"]?></a></li>

    <li><a href="Orders.php" Orders<?php if ($buttontohighlight == "Orders"){
                                   print ("class='active'");
        
    } ?>><?=$arrayofstrings["Orders"]?></a></li>

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
    /*function type($user){
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
    }*/
     function userAlreadyExists($checkUser) {

        global $connection;

        $sqlselect = $connection->prepare("select * from shopusers where username = ?");
        $sqlselect->bind_param("s", $checkUser);
        $sqlselect->execute();
        $result = $sqlselect->get_result();

        if($result->num_rows==0){
            return false;
        }
        else{
            return true;
        }
        

    }
function checkUsersPassword($givenUser, $givenPassword){
    global $connection;
    $sqlselect = $connection->prepare("select * from shopusers where username = ?");
    $sqlselect->bind_param("s", $givenUser);
    $sqlselect->execute();
    $result = $sqlselect->get_result();
    if($result->num_rows==0){
        return false;
    }
    else{
       $row = $result->fetch_assoc(); // this is A UNIQUE USER
       //if($row["psw"] == $givenPassword){
        if(password_verify( $givenPassword,$row["psw"])){
        return true;
       }
    }
    return false;
}
        




