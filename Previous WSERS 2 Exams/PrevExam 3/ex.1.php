<?php
$connection = new mysqli("localhost", "root", "", "your_database_name");

// Handle form submission
$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['person_name']);
    $cityId = $_POST['birth_city'];

    // Validate city selection
    if ($cityId == "0") {
        $errors[] = "Please choose a city!";
    } else {
        // Check if city exists
        $checkCity = $connection->prepare("SELECT CityId FROM Cities WHERE CityId = ?");
        $checkCity->bind_param("i", $cityId);
        $checkCity->execute();
        $resultCity = $checkCity->get_result();

        if ($resultCity->num_rows === 0) {
            $errors[] = "Selected city does not exist!";
        }
    }

    // Check if person already exists
    $checkPerson = $connection->prepare("SELECT * FROM People WHERE Name = ?");
    $checkPerson->bind_param("s", $name);
    $checkPerson->execute();
    $resultPerson = $checkPerson->get_result();

    if ($resultPerson->num_rows > 0) {
        $errors[] = "Double registration is invalid!";
    }

    // If no errors, insert new person
    if (empty($errors)) {
        $insert = $connection->prepare("INSERT INTO People (Name, CityId) VALUES (?, ?)");
        $insert->bind_param("si", $name, $cityId);
        $insert->execute();
        $success = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Person</title>
</head>
<body>

<h2>Register a Person</h2>

<?php
if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $err) {
        echo "<li>$err</li>";
    }
    echo "</ul>";
}

if ($success) {
    echo "<p style='color:green;'>$success</p>";
}
?>

<form method="POST">
    <label>Name:
        <input type="text" name="person_name" required>
    </label><br><br>

    <label>Birth City:
        <select name="birth_city" required>
            <option value="0">Please choose city</option>
            <?php
            $cities = $connection->query("SELECT CityId, CityName FROM Cities");
            while ($row = $cities->fetch_assoc()) {
                echo "<option value='" . $row['CityId'] . "'>" . $row['CityName'] . "</option>";
            }
            ?>
        </select>
    </label><br><br>

    <input type="submit" value="Register">
</form>

</body>
</html>
