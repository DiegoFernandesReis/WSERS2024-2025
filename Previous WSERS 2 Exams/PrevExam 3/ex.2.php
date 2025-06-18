<?php
session_start();

// Initialize session variables if not set
if (!isset($_SESSION['ValueOfNumber'])) $_SESSION['ValueOfNumber'] = 0;
if (!isset($_SESSION['SelectedOption'])) $_SESSION['SelectedOption'] = 0;

// Handle calculation form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operation'])) {
    $selected = intval($_POST['operation']);
    $_SESSION['SelectedOption'] = $selected;

    $number = isset($_POST['number']) ? intval($_POST['number']) : 0;

    if ($selected === 1) {
        $_SESSION['ValueOfNumber'] += $number;
    } elseif ($selected === 2) {
        $_SESSION['ValueOfNumber'] -= $number;
    }
}

// Handle session destroy
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Calculator</title>
</head>
<body>

<h2>Session Calculator</h2>

<form method="POST">
    <label>Operation:
        <select name="operation">
            <option value="0" <?= $_SESSION['SelectedOption'] == 0 ? "selected" : "" ?>>Please select an operation</option>
            <option value="1" <?= $_SESSION['SelectedOption'] == 1 ? "selected" : "" ?>>Add</option>
            <option value="2" <?= $_SESSION['SelectedOption'] == 2 ? "selected" : "" ?>>Subtract</option>
        </select>
    </label><br><br>

    <label>Number:
        <input type="number" name="number" required>
    </label><br><br>

    <input type="submit" value="Calculate">
</form>

<p><strong>Current Value:</strong> <?= $_SESSION['ValueOfNumber'] ?></p>

<!-- Reset form -->
<form method="POST">
    <input type="submit" name="reset" value="Restart Calculator">
</form>

</body>
</html>
