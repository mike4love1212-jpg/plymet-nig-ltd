<?php
session_start();
include("db_connect.php");


if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}


$product_id = $_POST['product_id'] ?? null;
$quantity = $_POST['quantity'] ?? null;
$product_name = $_POST['product_name'] ?? null;
$product_description = $_POST['product_description'] ?? null;

$total_amount = $_POST['total_amount'] ?? null;
// $user_id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'] ?? 'Unknown';


if (!$product_id || !$quantity || !$total_amount) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit();
}


$sql = "INSERT INTO checkout (id, fullname, product_name, quantity, total_amount, product_description)
        VALUES ('$product_id', '$fullname', '$product_name', '$quantity', '$total_amount', '$product_description')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['success' => true, 'message' => 'Order placed successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error placing order: ' . mysqli_error($conn)]);
}
?>
