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

$conn->close();

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->WriteHTML('<h1>Order Receipt</h1>');
$pdf->WriteHTML('<h2>DigiClean Laundry Management Systems</h2>');
$pdf->WriteHTML('<h3>Contacts:0720623014</h3>');
$pdf->WriteHTML('<p>Order ID: ' . htmlspecialchars($order['order_id']) . '</p>');
$pdf->WriteHTML('<p>Service Provider: ' . htmlspecialchars($order['service_provider']) . '</p>');
$pdf->WriteHTML('<p>Phone Number: ' . htmlspecialchars($order['phone_number']) . '</p>');
$pdf->WriteHTML('<p>Pickup Location: ' . htmlspecialchars($order['pickup_location']) . '</p>');
$pdf->WriteHTML('<p>Drop-off Location: ' . htmlspecialchars($order['dropoff_location']) . '</p>');
$pdf->WriteHTML('<p>Pick-up Date: ' . htmlspecialchars(date('F j, Y', strtotime($order['pick_up_date']))) . '</p>');

$pdf->Output('generate.pdf', 'D');