<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Admin Register</title>
</head>
<body>
    <?php
      include("./header/header.php");

    ?>
<div class="container flex flex-col items-center justify-center mx-auto  mt-[3rem]">
    <div class="relative form-box bg-gray-200 rounded-xl w-[500px] h-content mx-auto p-8 flex flex-col c justify-center">
        <div class="absolute top-0 left-0 right-0 rounded-xl bg-slate-300 w-full p-2">

            <h2 class="text-green-600 mb-4 text-center text-2xl">Admin Registration</h2>
            <?php
                if (isset($_GET['error'])) {
                    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3" role="alert">
                            <span class="block sm:inline">' . htmlspecialchars($_GET['error']) . '</span>
                          </div>';
                }
                if (isset($_GET['success'])) {
                    echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-3" role="alert">
                            <span class="block sm:inline">' . htmlspecialchars($_GET['success']) . '</span>
                          </div>';
                }
            ?>
        </div>
        <form id="form" class="flex py-8 flex-col space-y-3 w-full " action="admin_register.php " method="POST">
            <div class="form-row flex flex-col gap-3">
                <label for="">Fullname</label>
                    <input class=" text-[15px] w-full border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="text" name="fullname" id="" placeholder="Full name" required>
            </div>

            <div class="form-row flex flex-col gap-1">
                <label for="">Email</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="email" name="email" id="" placeholder="example@.com" required>
            </div>

            <div class="form-row flex flex-col gap-2">
                <label for="">Password</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="password" name="password" id="" placeholder="Enter Password" required>
            </div>

            <div class="form-row flex flex-col gap-2">
                <label for="">Confirm Password</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none " type="password" name="confirm_password" id="" placeholder="Confirm Password" required>
            </div>

            <div class="form-row flex flex-col gap-2">
                 <button class="p-3 rounded-xl bg-green-300 text-white" type="submit">Register</button>   
            </div>
            <p class="text-center text-sm text-black/80 font-bold">Already registered? <a href="admin_login.php" class="decoration-none text-red-500">Login</a></p>

        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
        $fullname = trim($_POST["fullname"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
    
      
        if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
            header("Location: admin_register.php?error=All fields are required!");
            exit();
        }
    
        if ($password !== $confirm_password) {
            header("Location: admin_register.php?error=Passwords do not match!");
            exit();
        }


        $checkEmail = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
        if (mysqli_num_rows($checkEmail) > 0) {
            header("Location: admin_register.php?error=Email already registered!");
            exit();
        }
    
    
        $hash = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO admin (fullname, email, password) 
                VALUES ('$fullname', '$email', '$hash')";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin_register.php?success=Registration successful! You can now login.");
            exit();
        } else {
            header("Location: admin_register.php?error=Error during registration: " . $conn->error);
            exit();
        }
    }
    ?>

    </div>

</div> 

 <?php
    include("./footer/footer.php");
    ?>
</body>
</html>
