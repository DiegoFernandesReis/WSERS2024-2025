<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style.css?<?=time()?>">
    <img src="../images/nintendo_banner.webp" id="image">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     include_once("Commoncode.php");
     NavigationBar("Register");
   /* function form()
    {
        $username= false;
        $myfile = fopen("Clients.csv", "r");

        while (!feof($myfile)) {
            $linestring = fgets($myfile);
            $linearray = explode(";", $linestring);
            if ($linearray [0] == $_POST ["username"]){
                $username= true;
                print("'" . $linearray . "'exists already");
                break;
            }
    }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") { // Checks if a POST request was send to the server
    form();
    }*/
    
    if(isset($_POST["username"], $_POST["psw"] , $_POST["pswAgain"])){
        print("Registration in process...");
        if($_POST["psw"] == $_POST["pswAgain"]) {
            $fileUsers= fopen("Clients.csv","a");
            if(userAlreadyExists($_POST["username"])){
                print($arrayofstrings["alreadyexists"]);
            }
            else{
            
            $goodPassword= str_replace(";","#", $_POST["psw"]);
           // print($goodPassword);
                fputs($fileUsers, "\n" . $_POST["username"] . ";" . $goodPassword . ";" );
                print($arrayofstrings["Registration"]);
            }
        } else {
            print($arrayofstrings["passwordnotmatch"]);
        }
    }
    
    ?>
   
    <h1><?=$arrayofstrings["RegisterMessage"]?>: </h1>

    <form method="POST">
    <input type="text" name="username" placeholder="><?=$arrayofstrings["Enterusername"]?>" />
    <input type="password" name="psw" placeholder="><?=$arrayofstrings["Choosepassword"]?>" />
    <input type="password" name="pswAgain" placeholder="><?=$arrayofstrings["Retypepassword"]?>" />
    <input type="submit" value="><?=$arrayofstrings["Createaccount"]?>">
</form>
</body>
</html>