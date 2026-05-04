<?php
session_start();
include("db_connect.php");


if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$productsResult = mysqli_query($conn, "SELECT COUNT(*) AS total_products FROM products");
$productsRow = mysqli_fetch_assoc($productsResult);
$totalProducts = $productsRow['total_products'] ?? 0;


$usersResult = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM customers");
$usersRow = mysqli_fetch_assoc($usersResult);
$totalUsers = $usersRow['total_users'] ?? 0;


$ordersResult = mysqli_query($conn, "SELECT COUNT(*) AS total_orders FROM checkout");
$ordersRow = mysqli_fetch_assoc($ordersResult);
$totalOrders = $ordersRow['total_orders'] ?? 0;

$messagesResult = mysqli_query($conn, "SELECT COUNT(*) AS total_messages FROM contact");
$messagesRow = mysqli_fetch_assoc($messagesResult);
$totalMessages = $messagesRow['total_messages'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4ade80'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen">

    
    <aside class="w-64 bg-white/70 backdrop-blur-lg shadow-lg border-r border-gray-200">
        <div class="p-6 text-2xl font-bold text-green-500">Plymet Admin</div>
        <nav class="mt-6">
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-green-100">Dashboard</a>
            <a href="#orders" class="block px-6 py-3 text-gray-700 hover:bg-green-100">View Orders</a>
            <a href="#messages" class="block px-6 py-3 text-gray-700 hover:bg-green-100">View Messages</a>
            <a href="#add" class="block px-6 py-3 text-gray-700 hover:bg-green-100">Add Product</a>
            <a href="#view" class="block px-6 py-3 text-gray-700 hover:bg-green-100">View Products</a>
            <hr class="my-4 border-gray-300">
            <a href="admin_logout.php" class="block px-6 py-3 text-red-600 hover:bg-red-100 font-semibold">Logout</a>
        </nav>
    </aside>


    <main class="flex-1 p-8 overflow-y-auto">

      
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-700">Dashboard</h1>
            <p class="text-gray-500">Manage your products easily</p>
        </div>

       
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white/60 backdrop-blur-lg p-6 rounded-2xl shadow">
                <h2 class="text-gray-500">Total Products</h2>
                <p class="text-2xl font-bold text-green-500"><?php echo $totalProducts; ?></p>
            </div>
            <!-- <div class="bg-white/60 backdrop-blur-lg p-6 rounded-2xl shadow">
                <h2 class="text-gray-500">Sales</h2>
                <p class="text-2xl font-bold text-green-500">N3,400</p>
            </div> -->
            <div class="bg-white/60 backdrop-blur-lg p-6 rounded-2xl shadow">
                <h2 class="text-gray-500">Users</h2>
                <p class="text-2xl font-bold text-green-500"><?php echo $totalUsers; ?></p>
            </div>
            <div class="bg-white/60 backdrop-blur-lg p-6 rounded-2xl shadow">
                <h2 class="text-gray-500">Orders</h2>
                <p class="text-2xl font-bold text-green-500"><?php echo $totalOrders; ?></p>
            </div>
            <div class="bg-white/60 backdrop-blur-lg p-6 rounded-2xl shadow">
                <h2 class="text-gray-500">Messages</h2>
                <p class="text-2xl font-bold text-green-500"><?php echo $totalMessages; ?></p>
            </div>
        </div>

  
        <div id="messages" class="bg-white/70 backdrop-blur-lg p-8 rounded-2xl shadow mb-10">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Contact Messages</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-500 border-b bg-gray-50">
                            <th class="py-3 px-4">Message ID</th>
                            <th class="py-3 px-4">Full Name</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Phone</th>
                            <th class="py-3 px-4">Category</th>
                            <th class="py-3 px-4">Subject</th>
                            <th class="py-3 px-4">Message</th>
                            <th class="py-3 px-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $messages = mysqli_query($conn, "SELECT * FROM contact ORDER BY id DESC");
                        
                        if(mysqli_num_rows($messages) > 0){
                            while($message = mysqli_fetch_assoc($messages)){
                                echo "<tr class='border-b hover:bg-gray-50 transition'>\n";
                                echo "  <td class='py-3 px-4 font-semibold text-green-600'>#{$message['id']}</td>\n";
                                echo "  <td class='py-3 px-4'>{$message['fullname']}</td>\n";
                                echo "  <td class='py-3 px-4 text-sm'>{$message['email']}</td>\n";
                                echo "  <td class='py-3 px-4 text-sm'>{$message['phone']}</td>\n";
                                echo "  <td class='py-3 px-4'><span class='bg-purple-100 text-purple-800 px-3 py-1 rounded text-sm'>{$message['category']}</span></td>\n";
                                echo "  <td class='py-3 px-4'>{$message['subject']}</td>\n";
                                echo "  <td class='py-3 px-4 text-gray-600 max-w-xs truncate'>" . substr($message['message'], 0, 50) . (strlen($message['message']) > 50 ? '...' : '') . "</td>\n";
                                echo "  <td class='py-3 px-4 text-gray-600 text-sm'>" . (isset($message['created_at']) ? date('M d, Y H:i', strtotime($message['created_at'])) : date('M d, Y')) . "</td>\n";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='py-4 text-center text-gray-500'>No messages yet</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
     
        <div id="orders" class="bg-white/70 backdrop-blur-lg p-8 rounded-2xl shadow mb-10">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">User Orders</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-500 border-b bg-gray-50">
                            <th class="py-3 px-4">Order ID</th>
                            <th class="py-3 px-4">Customer Name</th>
                            <th class="py-3 px-4">Product</th>
                            <th class="py-3 px-4">Quantity</th>
                            <th class="py-3 px-4">Total Amount</th>
                            <th class="py-3 px-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orders = mysqli_query($conn, "SELECT * FROM checkout ORDER BY id DESC");
                        
                        if(!$orders) {
                            echo "<tr><td colspan='7' class='py-4 text-center text-red-600'>Error loading orders: " . mysqli_error($conn) . "</td></tr>";
                        } elseif(mysqli_num_rows($orders) > 0){
                            while($order = mysqli_fetch_assoc($orders)){
                                echo "<tr class='border-b hover:bg-gray-50 transition'>\n";
                                echo "  <td class='py-3 px-4 font-semibold text-green-600'>#{$order['id']}</td>\n";
                                echo "  <td class='py-3 px-4'>{$order['fullname']}</td>\n";
                                echo "  <td class='py-3 px-4'>{$order['product_name']}</td>\n";
                                echo "  <td class='py-3 px-4 text-center'><span class='bg-blue-100 text-blue-800 px-3 py-1 rounded'>{$order['quantity']}</span></td>\n";
                                echo "  <td class='py-3 px-4 text-green-600 font-bold'>₦" . number_format($order['total_amount'], 2) . "</td>\n";
                                echo "  <td class='py-3 px-4 text-gray-600 text-sm'>" . (isset($order['created_at']) ? date('M d, Y H:i', strtotime($order['created_at'])) : 'N/A') . "</td>\n";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='py-4 text-center text-gray-500'>No orders yet</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div id="messages" class="bg-white/70 backdrop-blur-lg p-8 rounded-2xl shadow mb-10">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Contact Messages</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-500 border-b bg-gray-50">
                            <th class="py-3 px-4">Message ID</th>
                            <th class="py-3 px-4">Full Name</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Phone</th>
                            <th class="py-3 px-4">Category</th>
                            <th class="py-3 px-4">Subject</th>
                            <th class="py-3 px-4">Message</th>
                            <th class="py-3 px-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $messages = mysqli_query($conn, "SELECT * FROM contact ORDER BY id DESC");
                        
                        if(mysqli_num_rows($messages) > 0){
                            while($message = mysqli_fetch_assoc($messages)){
                                echo "<tr class='border-b hover:bg-gray-50 transition'>\n";
                                echo "  <td class='py-3 px-4 font-semibold text-green-600'>#{$message['id']}</td>\n";
                                echo "  <td class='py-3 px-4'>{$message['fullname']}</td>\n";
                                echo "  <td class='py-3 px-4 text-sm'>{$message['email']}</td>\n";
                                echo "  <td class='py-3 px-4 text-sm'>{$message['phone']}</td>\n";
                                echo "  <td class='py-3 px-4'><span class='bg-purple-100 text-purple-800 px-3 py-1 rounded text-sm'>{$message['category']}</span></td>\n";
                                echo "  <td class='py-3 px-4'>{$message['subject']}</td>\n";
                                echo "  <td class='py-3 px-4 text-gray-600 max-w-xs truncate'>" . substr($message['message'], 0, 50) . (strlen($message['message']) > 50 ? '...' : '') . "</td>\n";
                                echo "  <td class='py-3 px-4 text-gray-600 text-sm'>" . (isset($message['created_at']) ? date('M d, Y H:i', strtotime($message['created_at'])) : date('M d, Y')) . "</td>\n";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='py-4 text-center text-gray-500'>No messages yet</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
     
        <div id="add" class="bg-white/70 backdrop-blur-lg p-8 rounded-2xl shadow mb-10">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Add Product</h2>
            <form method="POST" action="">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="product_name" placeholder="Product Name" class="p-3 border rounded-lg">
                    <input type="number" name="product_price" placeholder="Price" class="p-3 border rounded-lg">
                    <input type="text" name="product_description" placeholder="Description" class="p-3 border rounded-lg">

                </div>
                <input name="product_img" type="file" class="w-full mt-4 p-3 border rounded-lg">
                <button type="submit" class="mt-4 bg-green-400 hover:bg-green-500 text-white px-6 py-2 rounded-lg">Add Product</button>
            </form>
        </div>

   
        <div id="view" class="bg-white/70 backdrop-blur-lg p-8 rounded-2xl shadow">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Products</h2>
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-500 border-b">
                        <th class="py-2">Name</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include("db_connect.php");
    
        $products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

       
        if(mysqli_num_rows($products) > 0){

            while($row = mysqli_fetch_assoc($products)){

                foreach ($products as $product) {
                    echo "<tr class='border-b '>
                            <td class='py-2'>{$product['product_name']}</td>
                            <td>{$product['product_price']}</td>
                            <td class=''>{$product['product_description']}</td>
                           
                          </tr>";
                }
            }
        }
                    ?>
                </tbody>
            </table>
        </div>

    <?php
    include("db_connect.php");

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $productName = $_POST["product_name"];
        $productImg = $_POST["product_img"];
        $productPrice = $_POST["product_price"];
        $productDesc = $_POST["product_description"];



        if(empty($productName || $productImg || $productPrice)){
            echo "All spaces are required";
        }


        $productDesc = $_POST["product_description"];
        $sql = "INSERT INTO products(product_name, product_img, product_price, product_description) VALUES('$productName', '$productImg', '$productPrice', '$productDesc')";

    if(mysqli_query($conn, $sql)){
        echo "Product Added";
    } else{
        echo "Something Went Wrong!";
    }

    }
    ?>
    </main>

</div>

</body>
</html>
