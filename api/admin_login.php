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

    <title>Admin Login</title>
</head>
<body>

   <?php
      include("./header/header.php");

    ?>
<div class="container flex flex-col items-center justify-center mx-auto  mt-[3rem]">
    <div class="relative form-box bg-gray-200 rounded-xl w-[500px] h-content mx-auto p-8 flex flex-col c justify-center">
        <div class="absolute top-0 left-0 right-0 rounded-xl bg-slate-300 w-full p-2">

            <h2 class="text-green-600 mb-4 text-center text-2xl">ADMIN LOGIN</h2>
        </div>
        <form id="form" class="flex py-8 flex-col space-y-3 w-full " action="admin_login_logic.php " method="POST">
            <div class="form-row flex flex-col gap-1">
                <label for="">Email</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="email" name="email" id="" placeholder="example@.com" required>
            </div>

            <div class="form-row flex flex-col gap-2">
                <label for="">Password</label>
                    <input class=" text-[15px] border-1 border-gray-300 rounded-lg p-2 focus:outline-none" type="password" name="password" id="" placeholder="Enter Password" required>
            </div>

            <div class="form-row flex flex-col gap-2">
                 <button class="p-3 rounded-xl bg-green-300 text-white" type="submit">Login</button>   
            </div>
            <p class="text-center text-sm text-black/80 font-bold">Not registered? <a href="admin_register.php" class="decoration-none text-red-500">Register as Admin</a></p>
        </form>
    </div>

</div> 

 <?php
    include("./footer/footer.php");
    ?>
</body>
</html>
