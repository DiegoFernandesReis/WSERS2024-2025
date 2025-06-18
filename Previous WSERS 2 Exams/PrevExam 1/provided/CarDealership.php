<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    // Database connection setup
    $host = "localhost";
    $username = "root";
    $psw = "";
    $dbName = "WSERS2_R";

    // Step 1: Connect to MySQL database
    $connection = mysqli_connect($host, $username, $psw,  $dbName);
    ?>
    <title>Document</title>
    <style>
        /* Basic table styling */
        tr,
        td {
            border: 2px solid black;
            text-align: center;
            padding: 10px;
        }

        /* Class applied when available cars are less than orders */
        .lowCars {
            background-color: pink;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <!-- Table headers -->
            <th>Car model</th>
            <th>Price</th>
            <th>Available</th>
            <th>Orders</th>
        </tr>
        <?php
        // Get all car data from the view
        $result = $connection->query("SELECT * FROM CarsView");

        // Initialize total income variable
        $TotalIncome = 0;

        // If the form is submitted
        if (isset($_POST["ClientName"], $_POST["CarType"], $_POST["HowMany"])) {

            // Insert the order into Orders table
            $sqlInsert = $connection->prepare("Insert Into Orders (ClientName, ModelIdOrdered, NumberOfCarsOrdered) Values(?,?,?);");
            $sqlInsert->bind_param("ssi", $_POST["ClientName"] , $_POST["CarType"], $_POST["HowMany"]);
            $sqlInsert->execute();

            // Update the number of available cars in CarsDb
            $sqlUpdate = $connection->prepare("UPDATE CarsDb SET Available = Available - ? WHERE ModelIdCar = ?");
            $sqlUpdate->bind_param("is", $_POST["HowMany"],  $_POST["CarType"]);
            $sqlUpdate->execute();

            // Reload the page to clear POST data and prevent re-submission
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // Loop through each row in CarsView
        while ($row = $result->fetch_assoc()) {
            // Calculate income per car type
            $numberOfcar = ($row['Ordered']) * ($row['Price']);
        ?>
            <!-- Apply 'lowCars' class if ordered > available -->
            <tr <?php if (($row['Available']) < ($row['Ordered'])) print('class="lowCars"'); ?>>
                <td><?php print($row['ModelName']); ?></td>
                <td><?php print($row['Price']); ?></td>
                <td><?php print($row['Available']); ?></td>
                <td><?php print($row['Ordered']); ?></td>
            </tr>
        <?php
            // Add to total income
            $TotalIncome += $numberOfcar;
        }
        ?>
        <tr>
            <!-- Empty row spacer if needed -->
        </tr>
        <tr>
            <!-- Display total income -->
            <td>Total income:</td>
            <td></td>
            <td></td>
            <td><?php print $TotalIncome ?></td>
        </tr>
    </table>

    <!-- Order form section -->
    <h1>Order cars here</h1>
    <form method="POST" action="">
        <div>
            <!-- Input for client name -->
            Your name<input type="text" name="ClientName" />
        </div>
        <div>
            <!-- Dropdown list of car types from CarsDb -->
            Please select the car type:
            <select name="CarType">
                <?php
                $sqlSelectTypes = $connection->prepare("SELECT * from CarsDb");
                $sqlSelectTypes->execute();
                $resultTypes = $sqlSelectTypes->get_result();

                // Populate dropdown options
                while ($rowType = $resultTypes->fetch_assoc()) {
                ?>
                    <option value="<?= $rowType["ModelIdCar"] ?>"><?= $rowType["ModelName"] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div>
            <!-- Input for number of cars to order -->
            How many do you want: <input type="number" name="HowMany" />
        </div>
        <div>
            <!-- Submit button -->
            <input type="submit" value="Order" />
        </div>
    </form>
</body>

</html>
