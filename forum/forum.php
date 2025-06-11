<?php
$connection = new mysqli("localhost", "root", "", "forum_db");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $message = $_POST["message"];

    // Get or create user
    $user = $connection->query("SELECT id FROM users WHERE username = '$username'");
    if ($user->num_rows > 0) {
        $user_id = $user->fetch_assoc()["id"];
    } else {
        $connection->query("INSERT INTO users (username) VALUES ('$username')");
        $user_id = $connection->insert_id;
    }

    // Insert message
    $connection->query("INSERT INTO messages (user_id, content) VALUES ($user_id, '$message')");
}
?>

<!DOCTYPE html>
<html>
<head><title>Mini Forum</title></head>
<body>
<h2>Simple Forum</h2>
<form method="POST">
    <input name="username" placeholder="Your name" required><br>
    <textarea name="message" placeholder="Your message" required></textarea><br>
    <input type="submit" value="Post">
</form>

<hr>
<h3>Messages:</h3>

<?php
$messages = $connection->query("SELECT * FROM messages ORDER BY created_at DESC");

while ($msg = $messages->fetch_assoc()) {
    $uid = $msg["user_id"];
    $user = $connection->query("SELECT username FROM users WHERE id = $uid")->fetch_assoc();
    echo "<p><b>{$user['username']}</b> @ {$msg['created_at']}<br>" .
         htmlspecialchars($msg['content']) . "</p><hr>";
}
?>
</body>
</html>
