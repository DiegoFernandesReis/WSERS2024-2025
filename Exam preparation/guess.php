<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Word</title>
    <style>
        .active {
            border: 2px solid red;
        }
    </style>
</head>
<body>

    <!-- Navigation bar with active link highlighting -->
    <div>
        <a href="guess.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'guess.php') ? 'active' : ''; ?>">Try again here</a>
        <a href="results.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'results.php') ? 'active' : ''; ?>">See your previous tries here</a>
    </div>

    <?php
    
    $correctAnswers = [];
    $file = fopen('correct.txt', 'r'); 
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line); 
            if (!empty($line)) {
                $correctAnswers[] = $line;  
            }
        }
        fclose($file);  
    }


    if (isset($_POST["try"])) {
        $guess = trim($_POST["guess"]);  

        // Check if the guess is correct
        if (in_array($guess, $correctAnswers)) {
            echo "<h1>YOU NAILED IT</h1>";
        } else {
            echo "<h1>You missed it</h1>";
            recordTry($guess);  
        }
    }

   
    function recordTry($guess) {

        $file = fopen('tries.txt', 'a');  
        if ($file) {
            
            fwrite($file, $guess . "\n");  
            fclose($file);  
        }
    }
    ?>


    <form method="post">
        <label for="guess">Guess the word: </label>
        <input type="text" name="guess" id="guess" required>
        <button type="submit" name="try">Try</button>
    </form>

</body>
</html>