<?php 
    session_start();
    include("db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) || empty($password)) {
            echo "Email and password are required!";
            exit();
        }

        // Check in customers table first
        $customerQuery = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email'");
        $customerFound = mysqli_num_rows($customerQuery) > 0;

        // Check in farmers table
        $farmerQuery = mysqli_query($conn, "SELECT * FROM farmers WHERE email = '$email'");
        $farmerFound = mysqli_num_rows($farmerQuery) > 0;

        if ($customerFound) {
            $user = mysqli_fetch_assoc($customerQuery);
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect to marketplace
                header("Location: market.php");
                exit();
            } else {
                echo "Invalid password!";
                exit();
            }
        } elseif ($farmerFound) {
            $user = mysqli_fetch_assoc($farmerQuery);
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect to marketplace
                header("Location: market.php");
                exit();
            } else {
                echo "Invalid password!";
                exit();
            }
        } else {
            echo "User not found!";
            exit();
        }
    }
?>