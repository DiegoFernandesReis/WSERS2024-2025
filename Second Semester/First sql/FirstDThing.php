<!DOCTYPE html>
<html lang="en">

<head>
  <meta Charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" Content="IE=edge">
  <meta name="viewport" Content="width=deviCe-width, initial-sCale=1.0">
  <title>Document</title>
</head>

<body>
  <h1></h1>


  <form method="POST">
    <select name="CountrySelected">

      <?php

      $host = "localhost";
      $username = "root";
      $psw = "";
      $dbName = "mydbtestno2";

      //step 1
      $connection = mysqli_Connect($host, $username, $psw, $dbName);

      $sqlSelectStatement = $connection->prepare("Select * from Countries;");
      $sqlSelectStatement->execute();

      $results = $sqlSelectStatement->get_result();

      while ($row = $results->fetch_assoc()) {
        ?>
        <option <?php if (isset($_POST["CountrySelected"]) && $_POST["CountrySelected"] == $row["CountryId"])
          print "selected"; ?> value="<?= $row["CountryId"] ?>">
          <?= $row["CountryName"] ?>
        </option>

        <?php

      }
      ?>
    </select>
    <input type="submit" value='Submit'>
  </form>

  <table>
  <tr>
    <th>Uname</th>
    <th>Countryname</th>
  </tr>
  <?php
  $host = "localhost";
  $username = "root";
  $psw = "";
  $dbName = "mydbtestno2";

  //step 1
  $connection = mysqli_connect($host, $username, $psw, $dbName);

  //step 2
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["CountrySelected"]) && $_POST["CountrySelected"] != 0) {
      $sqlSelectStatement = $connection->prepare("Select UserName,CountryName from Users,Countries where Users.CountryId=Countries.CountryId and Users.CountryId = ?;");
      $sqlSelectStatement->bind_param("i", $_POST["CountrySelected"]);
    } else {
      $sqlSelectStatement = $connection->prepare(query: "Select UserName,CountryName from Users,Countries where Users.CountryId=Countries.CountryId;");
    }


    // step 3
    $sqlSelectStatement->bind_param("i", $_POST["CountrySelected"]);


    //step 4 : EXECUTE the sql statement
    $sqlSelectStatement->execute();

    //step 5 : get the result
    $results = $sqlSelectStatement->get_result();
  }

  while ($row = $results->fetch_assoc()) {
    ?>
    <tr>
    <td><?=$row["CountryName"]?></td>
    <td><?=$row["UserName"] ?></td>
    </tr>
    

    <?php

  }
  ?>
  
  
</table> 



  <!--
  <select>

    <option value="IDfCountry2">Country 2</option>
    <option value="IDfCountry3">Country 3</option>
    
  <input>
  </select>-->
</body>

</html>