<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Guesses</title>
    <style>
        .active {
            border: 2px solid red;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar with Active Link Highlighting -->
    <div>
        <a href="guess.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'guess.php') ? 'active' : ''; ?>">Try again here</a>
        <a href="results.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'results.php') ? 'active' : ''; ?>">See your previous tries here</a>
    </div>

    <h2>Previous Guesses</h2>

    <?php
 
    $guesses = [];
    $file = fopen('tries.txt', 'r');
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line); 
            if (!empty($line)) {
                $guesses[] = $line;
            }
        }
        fclose($file);
    }

   
    foreach ($guesses as $guess) {
        echo "<div>$guess</div>";
    }

    
    $totalGuesses = count($guesses);
    echo "<h3>Total tries: $totalGuesses</h3>";
    ?>

</body>
</html>