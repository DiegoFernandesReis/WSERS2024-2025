<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include_once("common.php");

    if(isset($_POST["username"], $_POST["psw"])){
        print("Registration in process...");
        if($_POST["psw"] == $_POST["pswAgain"]) {

            
            if(userAlreadyExists($_POST["username"])){
                print("Username already exists");
            }
            else{
                $userid=2;
                // we will insert the user into the DB
                $hashedPassword = password_hash($_POST["psw"], PASSWORD_DEFAULT);
                $sqlinsert= $connection->prepare("Insert into users(id, username, password) Values (?, ?,?);");
                $sqlinsert->bind_param("ssi", $_POST["username"], $hashedPassword, $userid);
                $sqlinsert->execute();
        
                print("Registration successfully");
            }
            
        } else {
            print("Passwords do not match");
        }
    }
    
    ?>
   
    <h1>To Register fill the following form: </h1>

    <form method="POST">
    <input type="text" name="username" placeholder="Enter your username" />
    <input type="password" name="psw" placeholder="Please choose a password" />>
    <input type="password" name="pswAgain" placeholder="Please retype the password" />
</form>
</body>
</html>

    
</body>
</html>