<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello database</h1>

<input?php
$host="localhost";
$username="root";
$psw= "";
$dbName="mydbtestno2";

//step 1
$connection = mysqli_connect($host, $username, $psw,  $dbName);

//step 2
$sqlSelectStatement = $connection->prepare("Select * from countries where CountryId= ?");

// step 3
$sqlSelectStatement->bind_param("i", $_POST["Country"]);


//step 4 : EXECUTE the sql statement
$sqlSelectStatement->execute();

//step 5 : get the result
$results = $sqlSelectStatement->get_result();


?>

<table>
  <tr>
    <th>Users</th>
    <th>Country Name</th>
    
  </tr>

  <?php
  // loop to display the result:
  while($row = $results->fetch_assoc()){
  ?>
    <tr>     
        <form method="POST">
            <select>
            <option value= "1">Luxembourg</option>
            <option value= "2">Portugal</option>
            <option value= "3">Germany</option>
            <option value= "4">Yeman</option>
            </select>
            <input type="submit">Submit</input>
        </form>
  

  </tr>
  <?php

  }


  ?>
 
  
</table> 
</body>
</html>