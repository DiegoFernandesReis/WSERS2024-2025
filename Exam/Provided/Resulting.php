<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <style>
            .box {
                width: 10px;
                height: 10px;
                display: inline-block;
            }

            .red {
                background-color: red;
            }

            .blue {
                background-color: blue;
            }

            .green {
                background-color: green;
            }

            table,
            td,
            th,
            tr {
                border: solid 1px;
            }

            td {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Task 1</h1>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box green"></div>
        <div class="box"></div>
        <br />
        <div class="box green"></div>
        <div class="box green"></div>
        <div class="box"></div>
        <div class="box red"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box green"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box"></div>
        <br />
        <div class="box green"></div>
        <div class="box green"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box green"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box blue"></div>
        <div class="box"></div>
        <br />
        <div class="box green"></div>
        <div class="box green"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box blue"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box blue"></div>
        <div class="box"></div>
        <br />
        <div class="box green"></div>
        <div class="box green"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box blue"></div>
        <div class="box green"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box red"></div>
        <div class="box"></div>
        <br />

        </body>

        <div></div>
        </div>

        <?php 
        
        $myfile = fopen("source.csv", "r");
        $line = fgets($myfile);
        while (!feof($myfile)) {
            echo "<div>";
            $line = fgets($myfile);
            $spaces = str_replace(" ", "", $line);
            $elements = explode(",", $spaces);

            if("r" == $elements[0]. $elements[1] . $elements[2]){
                print("<tr class='box red'</tr>");
            }
            else if ("g" == $elements[6]){
                print("<tr class='box green'></tr>");
            }
            else if ("b" == $elements[3] . $elements[4]. $elements[5]){
                print("<tr class='box blue'></tr>");
            }
            else{
                print("<tr class='box'></tr>");
            }
        }
    
        
        ?>
        <h1>Task 2</h1>

        <form>
            <select name="pickColorVanish">
                <option>Show all</option>
                <option value="r">Hide red</option>
                <option value="g">Hide green</option>
                <option value="b">Hide blue</option>
                <option value="w">Hide white</option>
            </select>
            <input type="submit" value="Do" />
        </form>
        <?php  
          if(isset($_POST["Do"])){
            button();
        }
            ?>
            <?php
            $red = ("<tr class='box red'</tr>");
            $green = ("<tr class='box red'</tr>");
            $blue = ("<tr class='box blue'</tr>");
            function button(){
            $color=fopen("source.csv", "a");
                fputs($color, "\n".$_POST["pickColorVanish"]);
                header("Refresh:0");
        }
        function display(){
            $myfile=fopen("source.csv", "r");
            $line=fgets($myfile);
            while(!feof($myfile)){
                $line=fgets($myfile);
                $class=explode(",", $line);
            }
        }

        if(isset($_POST["pickColorVanish"])== "r"){
            
        }

        
        ?>

        <h1>Task 3</h1>

        <table>
            <tr>
                <th>
                    Red
                    <div class="box red"></div>
                    count
                    <?php print($totalr); ?>
                </th>
                <th>
                    Blue
                    <div class="box blue"></div>
                    count
                </th>
                <th>
                    Green
                    <div class="box green"></div>
                    count
                </th>
                <th>
                    White
                    <div class="box white"></div>
                    count
                   
                </th>
            </tr>
            <tr>
            <?php 
             
            function sum(){
            $myfile=fopen("source.csv", "r");
            $line=fgets($myfile);
            while(!feof($myfile)){
                $line=fgets($myfile);
                $elements=explode(",", $line);

                if (count($elements) == 7){
                    if($elements[2] <= 20){
                        print("<td>" .$elements[0]. "</td><td>" .$elements[1]."</td><td> ".$elements[2]. "</td></tr></br>");
                    } 
                    else if($elements[2] >= 40) {
                        print("<td>" .$elements[3]. "</td><td>" .$elements[4]."</td><td> ".$elements[5]. "</td></tr></br>");
                    }
                    else{
                        print("<tr><td>" .$elements[6]. "</td><td>");
                    }
                    header("Refresh:0");
                }
        }
            }
            function total(){
                $file=fopen("source.csv", "r");
                $headingline=fgets($file);
                $sum=0;
                $count=0;
                while($line = fgets($file)){
                    $elements= explode(",", $line);
                    if(count($elements) == 7){
                        $count++;
                        $number=(int)$elements[2];
                        $sum += $number;
                    }
                }
                fclose($file);
                return $sum /$count;
            }

           
    

                    ?>

            </tr>
        </table>
        
        <h1>Task 4</h1>

        <form>
            <select name="pickColorVanishLast">
                <option value="r">Remove red</option>
                <option value="g">Remove green</option>
                <option value="b">Remove blue</option>
                <option value="w">Remove white</option>
            </select>
            <input type="number" name="countFromLast" placeholder="remove last elements count" value="" />
            <input type="submit" value="Remove last" />
        </form>
    </body>
</html>
