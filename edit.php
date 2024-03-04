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

$order_id = $_GET['id'];

$sql = "SELECT * FROM orders WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_provider = $_POST['service_provider'];
    $phone_number = $_POST['phone_number'];
    $pick_up_date = $_POST['pick_up_date'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];

    $sql = "UPDATE orders SET service_provider = ?, phone_number = ?, pick_up_date = ?, pickup_location = ?,  dropoff_location = ?  WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $service_provider, $phone_number, $pick_up_date, $pickup_location, $dropoff_location , $order_id);
    $stmt->execute();
    $stmt->close();

    header("Location: Dashboards.html");
    exit();
}

$conn->close();
$service_providers = [
    ['id' => 1, 'name' => 'Galaxy Cleaners'],
    ['id' => 2, 'name' => 'Ruxembourg Digital Cleaners'],
    ['id' => 3, 'name' => 'Chuknx Digital Cleaners'],
    ['id' => 4, 'name' => 'MuoshoMMoja Digital Cleaners'],
    ['id' => 5, 'name' => 'Boyz 2 Men Laundry TM'],
   
];

$selected_service_provider = null;
foreach ($service_providers as $service_provider) {
    if ($service_provider['id'] == $order['service_provider']) {
        $selected_service_provider = $service_provider;
        break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <link rel="stylesheet" type="text/css" href="Edit.css">
    <script>
        window.onload = function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("pick_up_date").setAttribute('min', today);
        }
    </script>
</head>
<body>
    <h1>Edit Order</h1>
    <form method="post" action="edit.php?id=<?= htmlspecialchars($order['order_id']) ?>">
    <label for="service_provider">Service Provider:</label>
        <select id="service_provider" name="service_provider">
            <?php foreach ($service_providers as $service_provider): ?>
                <option value="<?= htmlspecialchars($service_provider['name']) ?>" <?= $selected_service_provider == $service_provider ? 'selected' : '' ?>><?= htmlspecialchars($service_provider['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" value="<?= htmlspecialchars($order['phone_number']) ?>" required>

        <label for="pick_up_date">Pickup Date:</label>
        <input type="date" name="pick_up_date" id="pick_up_date" value="<?= htmlspecialchars($order['pick_up_date']) ?>" required>

        <label for="pickup_location">Pickup Location:</label>
        <input type="text" name="pickup_location" id="pickup_location" value="<?= htmlspecialchars($order['pickup_location']) ?>" required>

        <label for="dropoff_location">Drop-off Location:</label>
        <input type="text" name="dropoff_location" id="dropoff_location" value="<?= htmlspecialchars($order['dropoff_location']) ?>" required>

        <input type="submit" value="Update Order">
    </form>
</body>
</html>