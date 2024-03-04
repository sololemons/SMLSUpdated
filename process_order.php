
<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = $_SESSION['user_id'];

    $service_provider = $_POST['service_provider'];
    $phone_number = $_POST['phone_number'];
    $pick_up_date = $_POST['pick_up_date'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $user_id = $_SESSION['user_id'];

    

$sql = "INSERT INTO orders (service_provider, phone_number, pick_up_date, pickup_location, dropoff_location,user_id)
VALUES ('$service_provider', '$phone_number', '$pick_up_date', '$pickup_location', '$dropoff_location', '$user_id')";

if ($conn->query($sql) === TRUE) {
    header('Location: Dashboards.html');
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

