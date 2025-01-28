<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            $myFile = fopen("CarDb.csv", "r");
            $line = fgets($myFile);
            $total=0;
            $order=0;
            while (!feof($myFile)) {
                $line = fgets($myFile);
                $cars = explode(",", $line);
                $total += ((int)$cars[1] * (int)$cars[3]);
                

                            
                if (count($cars) == 4){
                   
                    if($cars[3] > $cars[2]){
                        print('<tr class="lowCars">' . '<td>' . $cars[0] . '</td>' . '<td>' . $cars[1] . '</td>' . '<td>' . $cars[2] . '</td>' . '<td>' . $cars[3] . '</td>');
                    } 
                    else  {
                        print('<tr>' . '<td>' . $cars[0] . '</td>' . '<td>' . $cars[1] . '</td>' . '<td>' . $cars[2] . '</td>' . '<td>' . $cars[3] . '</td>');
                    }
                }
                  
                }
     
        ?>
    
            <th>
                <tr>
                    <td>Total income:</td>
                    <td></td>
                    <td></td>
                    <td><?php print($total)?> €</td>
                </tr>
            </th>
        </table>
    </body>

    <h1>Order cars here</h1>
    <form method="POST">
        <div>Your name<input name="ClientName" /></div>
        <div>
            Please select the car type:
            <select name="CarType">
                <option>Dacia</option>
                <option>Volvo</option>
                <option>BMW</option>
                <option>Renault</option>
                <option>Tata Motors</option>
            </select>
        </div>
        <div>How many do you want:<input name="HowMany" /></div>
        <div><input type="submit" value="Order" name="Order"/></div>
    
       <?php
       if(isset($_POST["Order"])){
        order();
    }
        ?>
        <?php
        function order(){
        $myorders=fopen("Orders.csv", "a");
            fputs($myorders, "\n".$_POST["ClientName"] . "," . $_POST["CarType"] . "," . $_POST["HowMany"]);
            header("Refresh:0");
            addorder($_POST["CarType"], $_POST["HowMany"]);
    }
    function addorder($type, $quantity)
    {
        $carDbData = file("CarDb.csv"); // Reads the file into an array (foreach array index)
        $newview = [];
        foreach ($carDbData as $line) { // for each array index
            $linepiece = explode(",", $line);
            if (count($linepiece) == 4) { // check if line is valid
                if (trim($linepiece[0]) === $type) { // trim = remove any whitespaces
                    $linepiece[3] = (int)$linepiece[3] + (int)$quantity; // ordered cars + the number ordered from the form
                }
                $view[] = implode(",", $linepiece); // put each linepiece element with a "," together
            } else {
                $view[] = $line; // If line is invalid or empty
            }
        }
        file_put_contents("CarDb.csv", implode(PHP_EOL, $view) . PHP_EOL); // write back the changes from the line into the file
    }
 
        ?>

    </form>
</html>
