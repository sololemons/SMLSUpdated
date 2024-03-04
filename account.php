<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$host = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
 
</head>
<body>
    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

h1 {
  text-align: center;
  padding: 20px;
  background-color: #4CAF50;
  color: white;
}

p {
  text-align: center;
  padding: 20px;
  font-size: 20px;
}

a {
  display: block;
  text-align: center;
  padding: 20px;
  background-color: #4CAF50;
  color: white;
  text-decoration: none;
}

a:hover {
  background-color: #3e8e41;
}
    </style>
    <h1>My Account</h1>
    <p>Name: <?= htmlspecialchars($user['name']) ?></p>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>