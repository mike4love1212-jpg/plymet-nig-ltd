<?php 
    session_start();
    include("db_connect.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) || empty($password)) {
            header("Location: admin_login.php?error=Email and password are required!");
            exit();
        }

        // Check in admin table
        $adminQuery = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
        $adminFound = mysqli_num_rows($adminQuery) > 0;

        if ($adminFound) {
            $user = mysqli_fetch_assoc($adminQuery);
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_email'] = $user['email'];
                $_SESSION['admin_fullname'] = $user['fullname'];
                $_SESSION['is_admin'] = true;
                
                // Redirect to dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: admin_login.php?error=Invalid password!");
                exit();
            }
        } else {
            header("Location: admin_login.php?error=Admin account not found!");
            exit();
        }
    } else {
        header("Location: admin_login.php");
        exit();
    }
?>
