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

    <title>Register</title>
</head>
<body>
    <?php
      include("./header/header.php");

    ?>
<div class="container flex flex-col items-center justify-center mx-auto  mt-[3rem]">
    <div class="relative form-box bg-gray-200 rounded-xl w-[500px] h-content mx-auto p-8 flex flex-col c justify-center">
        <div class="absolute top-0 left-0 right-0 rounded-xl bg-slate-300 w-full p-2">

            <h2 class="text-green-600 mb-4 text-center text-2xl">Register Here</h2>
            <?php
                if (isset($_GET['error'])) {
                    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3" role="alert">
                            <span class="block sm:inline">' . htmlspecialchars($_GET['error']) . '</span>
                          </div>';
                }
            ?>
        </div>
        <form id="form" class="flex py-8 flex-col space-y-3 w-full " action="register.php " method="POST">
            <div class="form-row flex flex-col gap-3">
                <label for="">Fullname</label>
                    <input class=" text-[15px] w-full border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="text" name="fullname" id="" placeholder="Full name">
            </div>

            <div class="form-row flex flex-col gap-1">
                <label for="">Email</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="email" name="email" id="" placeholder="example@.com">
            </div>

            <div class="form-row flex flex-col gap-1">
                <select class="focus:border-green-300 border-1 border-slate-300"  name="role" id="">
                    <option  value="">--Select Role--</option>
                    <option  value="Farmer">Farmer</option>
                    <option name="customer" value="Customer">Customer</option>

                </select>
            </div>

            <div class="form-row flex flex-col gap-2">
                <label for="">Password</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="password" name="password" id="" placeholder="Enter Password">
            </div>

            <div class="form-row flex flex-col gap-2">
                <label for="">Confirm Password</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none " type="password" name="confirm_password" id="" placeholder="Enter Password">
            </div>

            <div class="form-row flex flex-col gap-2">
                 <button class="p-3 rounded-xl bg-green-300 text-white" type="submit">Register</button>   
            </div>
            <p class="text-center text-sm text-black/80 font-bold">Already registered? <a href="login.php" class="decoration-none text-blue-500">Login</a></p>

        </form>

        <?php
    include("db_connect.php");



    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $role = $_POST["role"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
    
    
        if ($password !== $confirm_password) {
            echo "Password mismatch";
            exit();
        }
    
        
        if ($role === "Farmer") {
            $hash = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO farmers (fullname, email, role, password) 
                    VALUES ('$fullname', '$email', '$role', '$hash')";
    
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO customers (fullname, email, role, password) 
                    VALUES ('$fullname', '$email', '$role', '$hash')";
        }
    
      
        if (mysqli_query($conn, $sql)) {
            echo "You are registered";
        } else {
            echo "Something went wrong!";
        }
    }
 

        ?>
    </div>

</div> 

<script>
   document.getElementById("form").addEventListener("submit", function(event) {
    event.preventDefault(); 

  
    fetch("register.php", {
        method: "POST",
        body: new FormData(this)
    })
    .then(response => {
        if (response.ok) {
            this.reset();
            alert("You are successfully Registered");
        } else{
            alert("Could not register")
        }
    });
});
</script>

 <?php
    include("./footer/footer.php");
    ?>
</body>
</html>