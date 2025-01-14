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
                padding: 5px;
            }

            .lowGrade {
                background-color: lightpink;
            }

            .highGrade {
                background-color: lightgreen;
            }

            form div {
                width: 300px;
                text-align: right;
                margin: 10px;
            }

            form {
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: center;
            }

            a {
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <table>
            <?php 
            display()
            ?>

            <tr>
                <th></th>
                <th>Class average: </th>
                <th></th>
                <th>35.9</th>
            </tr>
        </table>
        <a href="Students.php">Reset View</a>
        <h1>Add a new student:</h1>
        <form method="POST">
            <div>First name: <input name="fName" /></div>
            <div>Last name: <input name="lName" /></div>
            <div>Grade: <input name="Grade" /></div>
            <div><input type="submit" name="Add" value="Add" /></div>

            <?php  
          if(isset($_POST["Add"])){
            student();
        }
            ?>
            <?php
            function student(){
            $students=fopen("Students.csv", "a");
                fputs($students, "\n".$_POST["fName"] . "," . $_POST["lName"] . "," . $_POST["Grade"] . ",");
                header("Refresh:0");
            
        }
        function display(){
            $myFile = fopen("Students.csv", "r");
            $line = fgets($myFile);
            while (!feof($myFile)) {
                $line = fgets($myFile);
                $class = explode(",", $line);
            
                if (count($class) >= 2){
                    if($class[2] <= 20){
                        print("<tr class='lowGrade'><td>" .$class[0]. "</td><td>" .$class[1]."</td><td> ".$class[2]. "</td></tr></br>");
                    } 
                    else if($class[2] >= 40) {
                        print("<tr class='highGrade'><td>" .$class[0]. "</td><td>" .$class[1]."</td><td> ".$class[2]. "</td></tr></br>");
                    }
                    else{
                        print("<tr><td>" .$class[0]. "</td><td>" .$class[1]."</td><td> ".$class[2]. "</td></tr></br>");
                    }
                    header("Refresh:0");
                }
        }
        
    }
    
        
    
        ?>
        </form>
    </body>
</html>
