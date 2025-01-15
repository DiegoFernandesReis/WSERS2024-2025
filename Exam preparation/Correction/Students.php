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
            <tr>
                <th>Student ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Grade</th>
            </tr>
            <?php
            $avg= avg(); 
            ?>
            <tr class="highGrade">
                <td>1</td>
                <td>John</td>
                <td>Doe</td>
                <td><a href="Students.php?minDisplayed=55">55 </a></td>
            </tr>
            <tr class="highGrade">
                <td>4</td>
                <td>Bruce</td>
                <td>Lee</td>
                <td><a href="Students.php?minDisplayed=49">49 </a></td>
            </tr>

            <tr>
                <th></th>
                <th>Class average:</th>
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

            function student(){
                $students=fopen("Students.csv", "r");
                fputs($students , "\n" . $_POST["fName"] . "," . $_POST["lName"]. "," . $_POST["Grade"] );
                header("Refresh:0");
            }

            function display(){
                $myfile=fopen("Students.csv", "r");
                $line=fgets($myfile);
                while(!feof($myfile)){
                    $line=fgets($myfile);
                    $class=explode(",", $line);

                    if (count($class) == 3){
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

            function avg(){
                $file=fopen("Students.csv", "r");
                $headingline=fgets($file);
                $sum=0;
                $count=0;
                while($line = fgets($file)){
                    $class= explode(",", $line);
                    if(count($class) == 3){
                        $count++;
                        $grade=(int)$class[2];
                        $sum += $grade;
                    }
                }
                fclose($file);
                return $sum /$count;
            }

            ?>
        </form>
    </body>
</html>
