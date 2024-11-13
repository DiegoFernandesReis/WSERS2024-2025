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
                print("le nom d'utilisateur existe deja, choissisez un autre");
            }
            else{
            
            $goodPassword= str_replace(";","#", $POST["psw"]);
           // print($goodPassword);
                fputs($fileUsers, "\n" . $_POST["username"] . ";" . $goodPassword . ";" );
                print("Enregistrement complete");
            }
        } else {
            print("password incorrect, ressayez a nouveau !");
        }
    }
    
    ?>


    <h1>Pour vous enregistrer remplissez le format : </h1>

    <form method="POST">
    <input type="text" name="username" placeholder="Choissez un nom d'utilisateur" />
    <input type="password" name="psw" placeholder="choissisez password" />
    <input type="password" name="pswAgain" placeholder="retaper le password a nouveau" />
    <input type="submit" value="Crée le compte">
</form>
</body>
</html>