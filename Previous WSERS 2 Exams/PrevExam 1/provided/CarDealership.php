<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    $host = "localhost";
    $username = "root";
    $psw = "";
    $dbName = "WSERS2_R";
 
    //step 1
    $connection = mysqli_connect($host, $username, $psw,  $dbName);
    ?>
    <title>Document</title>
    <style>
        tr,
        td {
            border: 2px solid black;
            text-align: center;
            padding: 10px;
        }
 
        .lowCars {
            background-color: pink;
        }
    </style>
</head>
 
<body>
    <table>
        <tr>
            <th>Car model</th>
            <th>Price</th>
            <th>Available</th>
            <th>Orders</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM CarsView");
        $TotalIncome = 0;
        if (isset($_POST["ClientName"], $_POST["CarType"], $_POST["HowMany"])) {
 
            $sqlInsert = $connection->prepare("Insert Into Orders (ClientName, ModelIdOrdered, NumberOfCarsOrdered) Values(?,?,?);");
            $sqlInsert->bind_param("ssi", $_POST["ClientName"] , $_POST["CarType"], $_POST["HowMany"]);
            $sqlInsert->execute();
 
            //nouveau truc que je ne connaisait pas
            $sqlUpdate = $connection->prepare("UPDATE CarsDb SET Available = Available - ? WHERE ModelIdCar = ?");
            $sqlUpdate->bind_param("is", $_POST["HowMany"],  $_POST["CarType"]);
            $sqlUpdate->execute();
 
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        while ($row = $result->fetch_assoc()) {
            $numberOfcar = ($row['Ordered']) * ($row['Price']);
        ?>
            <tr <?php if (($row['Available']) < ($row['Ordered'])) print('class="lowCars"'); ?>>
                <td><?php print($row['ModelName']); ?></td>
                <td><?php print($row['Price']); ?></td>
                <td><?php print($row['Available']); ?></td>
                <td><?php print($row['Ordered']); ?></td>
            </tr>
        <?php
            $TotalIncome += $numberOfcar;
        }
        ?>
        <tr>
 
        </tr>
        <tr>
            <td>Total income:</td>
            <td></td>
            <td></td>
            <td><?php print $TotalIncome ?></td>
        </tr>
    </table>
    <h1>Order cars here</h1>
    <form method="POST" action="">
        <div>Your name<input type="text" name="ClientName" /></div>
        <div>
            Please select the car type:
            <select name="CarType">
                <?php
                $sqlSelectTypes = $connection->prepare("SELECT * from CarsDb");
                $sqlSelectTypes->execute();
                $resultTypes = $sqlSelectTypes->get_result();
 
                while ($rowType = $resultTypes->fetch_assoc()) {
                ?>
                    <option value="<?= $rowType["ModelIdCar"] ?>"><?= $rowType["ModelName"] ?></option>
                <?php
                }
                ?>
            </select>
 
 
        </div>
        <div>How many do you want: <input type="number" name="HowMany" /></div>
        <div><input type="submit" value="Order" /></div>
    </form>
</body>
 
</html>
 