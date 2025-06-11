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
session_start();

$host = "localhost";
$username = "root";
$psw = "";
$dbName = "WSERS2FORUM";

//step 1
$connection = mysqli_Connect($host, $username, $psw, $dbName);
 
global $connection;

$sqlselect = $connection->prepare("select * from users where username = ?");
$sqlselect->bind_param("s", $checkUser);
$sqlselect->execute();
$result = $sqlselect->get_result();

if($result->num_rows==0){
    return false;
}
else{
    return true;
}

function checkUsersPassword($givenUser, $givenPassword){
    global $connection;
    $sqlselect = $connection->prepare("select * from users where username = ?");
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
}
?>


</body>
</html>
