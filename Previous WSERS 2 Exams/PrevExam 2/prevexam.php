
    <?php
    session_start();
    
    $host = "localhost";
    $username = "root";
    $psw = "";
    $dbname = "examWSERS2";
    $conn = mysqli_connect($host, $username, $psw, $dbname);

    function userCHECK($checkuser){    // too see every username in the table
        global $conn;
        $sqlselect = $conn -> prepare("select * from People where Name = ?");
        $sqlselect -> bind_param("s", $checkuser);
        $sqlselect -> execute();
        $result = $sqlselect -> get_result();
        return $result -> num_rows > 0;
    }

    function login(){ // To login / register if the user doesn't exist
        global $conn;

    $username= $_POST["username"];
    if(!userCHECK($username)){
        $cash = 0;
        $sqlinsert= $conn -> prepare("insert into People (Name, Money) values (?,?)");
        $sqlinsert -> bind_param("si", $username, $cash);
        $sqlinsert -> execute();
    }
    $_SESSION["username"] = $username;
    return true;
}
if(isset($_POST["login"])){
    login();
}
if(isset($_POST["logout"])){ // logout : return to the previous page
    session_destroy();
    header("location:" . $_SERVER["PHP_SELF"]);
    exit();
}
if(!isset($_SESSION["username"])){ // To change the page when you log in
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    

</body>
<form method="POST">
            <input type="text" name="username" required placeholder="Enter Username" />
            <input type="submit" name="login">
        </form>
<?php
}
else {
    ?>
    <h1>Welcome, <?=($_SESSION['username']) ?></h1>
    <form method="post">

        <button type="submit" name="logout">Logout</button>
    </form>

    <h2>Your amount of money:</h2>

    <?php
    $stmt = $conn ->prepare("select Money from People where Name = ?"); // to check the users money
    $stmt ->bind_param("s", $_SESSION["username"]); 
    $stmt -> execute();
    $result = $stmt ->get_result();
    if($row = $result->fetch_assoc()){
        print( $row["Money"]. "€");
    }

?>
    <form method="post">

    <input type="text" name="promo" placeholder="Promotion" required></input>
    <button type="submit" name="submitpromo">submit</button>
</form>

    <?php
} 
if(isset($_POST['submitpromo'])){ // To check if the item is still available
    $promo = $_POST['promo'];
    global $conn;
    $sqlselect = $conn -> prepare('Select Value, Available from Promotions where Code = ?');
    $sqlselect -> bind_param('s', $promo);
    $sqlselect -> execute();
    $result = $sqlselect -> get_result();


    if($promocash = $result -> fetch_assoc()){  // if the item is available you can change the promotions and people tables
        if($promocash['Available'] > 0){
            $sqlupdate = $conn -> prepare('update Promotions set Available = Available -1 where Code = ?');
            $sqlupdate -> bind_param('s', $promo);
            $sqlupdate -> execute();

            $sqlupdatecash = $conn -> prepare('update People set Money = Money + ? where Name = ?');
            $sqlupdatecash -> bind_param('is', $promocash["value"], $_SESSION["username"]);
            $sqlupdatecash -> execute();

            print("Code applied");
        }
        else {
            print("code out of stock");
        }
        
}
else{
    print("incorrect code");
}
}

?>
</html>