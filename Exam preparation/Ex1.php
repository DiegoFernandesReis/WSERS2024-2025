<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box {
            display: inline-block;
            width: 20px;
            height: 20px;
        }

        .blueBox {
            background-color: blue;
        }

        .greenBox {
            background-color: green;
        }

        .redBox {
            background-color: red;
        }
    </style>

</head>

<body>
    <div> <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
        <span class="box  greenBox"> </span>
    </div>
    <div>MAX LIMIT reached</div>
    <div>
        <span class="box  redBox"> </span>
        <span class="box  redBox"> </span>
        <span class="box  redBox"> </span>
        <span class="box  redBox"> </span>
        <span class="box  redBox"> </span>
        <span class="box  redBox"> </span>
        <span class="box  redBox"> </span>
        <span class="box  redBox"> </span>
    </div>
    <div>Cannot parse this row</div>
    <div>Cannot parse this row</div>
    <div> <span class="box  blueBox"> </span>
        <span class="box  blueBox"> </span>
        <span class="box  blueBox"> </span>
    </div>

    <?php
    function database()
    {
        $myfile = fopen("db.txt", "r");
        $line = fgets($myfile);
        while (!feof($myfile)) {
            echo "<div>";
            $line = fgets($myfile);
            $spaces = str_replace(" ", "", $line);
            $elements = explode(",", $spaces);

            if (count($elements) !== 5) {
                print '<div>Cannot parse this row</div>';
            } else {

            }

            $sum = $elements[2] + $elements[3] + $elements[4];

            if ($sum > $elements[0]) {
                print ("MAX LIMIT reached");
            } else {
                while ($sum < $elements[0]) {
                    print ('<span class="box greenName"></span>');
                }
            }
            print ("</div>");
        }
    }

    ?>
</body>

</html>