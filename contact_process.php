<?php
include("./db_connect.php");


header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $category = trim($_POST["category"] ?? "");
    $message = trim($_POST["message"] ?? "");
    
  
    if (empty($fullname) || empty($email) || empty($phone) || empty($subject) || empty($category) || empty($message)) {
        echo json_encode([
            "status" => "error",
            "message" => "All fields are required."
        ]);
        exit;
    }
    
    if (!$conn) {
        echo json_encode([
            "status" => "error",
            "message" => "Database connection failed."
        ]);
        exit;
    }
    

    $sql = "INSERT INTO contact (fullname, email, phone, subject, category, message) VALUES ('$fullname', '$email', '$phone', '$subject', '$category', '$message')";
    
  
    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            "status" => "success",
            "message" => "Your message has been sent successfully. We'll get back to you soon!"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Error sending message: " . $conn->error
        ]);
    }
    
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}

$conn->close();
?>
