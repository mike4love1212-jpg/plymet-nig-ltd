<?php
session_start();
include("db_connect.php");


if (!isset($_SESSION['user_id'])) {
    header("Location: register.php?error=You must be logged in or registered to access the marketplace");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Store</title>
</head>

<body class="bg-gray-300">

<?php include("./header/header.php"); ?>

<div class="pt-20 w-full mx-auto flex justify-center mb-10">
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <?php
    
        $result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

       
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="bg-white/60 backdrop-blur-lg w-[250px] rounded-xl p-3 shadow-md hover:shadow-lg transition">

            <div class="w-full h-[180px] overflow-hidden rounded-md">
                <img class="object-cover w-full h-full" src="<?php echo $row['product_img']; ?>" alt="">
            </div>

            <div class="flex justify-between items-center my-4 px-2">
        
                <h3 class="text-black text-lg font-semibold">
                    <?php echo $row['product_name']; ?>
                </h3>

                <p class="text-green-500 font-bold">
                    N<?php echo $row['product_price']; ?>
                </p>
            </div>

            <div class="px-2">
                <button 
                    class="w-full py-2 rounded-md bg-green-400 hover:bg-green-500 text-white buy-btn" 
                    data-product-id="<?php echo $row['id']; ?>"
                    data-product-name="<?php echo $row['product_name']; ?>"
                    data-product-price="<?php echo $row['product_price']; ?>"
                    data-product-img="<?php echo $row['product_img']; ?>"
                    data-product-description="<?php echo htmlspecialchars($row['product_description'] ?? ''); ?>">
                    Buy
                </button>
            </div>

        </div>

        <?php
            }
        } else {
            echo "<p class='text-gray-600'>No products available</p>";
        }
        ?>
    </div>

</div>


<div id="checkoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 w-[500px] max-w-full shadow-2xl">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Checkout</h2>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

   
        <div class="bg-gray-100 rounded-lg p-4 mb-6">
            <div class="flex gap-4 mb-4">
                <img id="modalProductImg" class="w-24 h-24 object-cover rounded-md" src="" alt="">
                <div class="flex-1">
                    <h3 id="modalProductName" class="text-lg font-semibold text-gray-800 mb-2"></h3>
                    <p class="text-gray-600 mb-3">Price: <span id="modalProductPrice" class="text-green-500 font-bold text-lg">N0</span></p>
                </div>
            </div>
            <div class="border-t pt-4">
                <p class="text-sm text-gray-700 font-semibold mb-2">Product Details:</p>
                <p id="modalProductDescription" class="text-gray-600 text-sm leading-relaxed"></p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-3">Quantity</label>
            <div class="flex items-center gap-4 border rounded-lg p-3 w-fit">
                <button id="decreaseQty" class="text-green-500 font-bold text-xl hover:bg-gray-100 px-3 py-1 rounded">−</button>
                <input id="quantityInput" type="number" min="1" value="1" class="w-16 text-center text-lg font-semibold border-none outline-none">
                <button id="increaseQty" class="text-green-500 font-bold text-xl hover:bg-gray-100 px-3 py-1 rounded">+</button>
            </div>
        </div>

       
        <div class="bg-green-50 rounded-lg p-4 mb-6 border-2 border-green-200">
            <p class="text-gray-600 text-sm mb-1">Total Price</p>
            <p id="totalPrice" class="text-3xl font-bold text-green-500">N 0</p>
        </div>

        <form id="checkoutForm" class="flex gap-3">
            <input type="hidden" id="productId" name="product_id">
            <input type="hidden" id="quantity" name="quantity">
            <input type="hidden" id="totalAmount" name="total_amount">
            <button type="submit" class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition">
                Confirm Order
            </button>
            <button type="button" id="cancelBtn" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 rounded-lg transition">
                Cancel
            </button>
        </form>
    </div>
</div>

<script>
    let currentProduct = null;

    document.querySelectorAll('.buy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productPrice = this.dataset.productPrice;
            const productImg = this.dataset.productImg;
            const productDescription = this.dataset.productDescription;

            currentProduct = {
                id: productId,
                name: productName,
                price: parseFloat(productPrice),
                img: productImg,
                description: productDescription
            };

            document.getElementById('modalProductName').textContent = productName;
            document.getElementById('modalProductPrice').textContent = 'N' + productPrice;
            document.getElementById('modalProductImg').src = productImg;
            document.getElementById('modalProductDescription').textContent = productDescription || 'No description available';
            document.getElementById('productId').value = productId;
            document.getElementById('quantityInput').value = 1;
            
            updateTotalPrice();
            document.getElementById('checkoutModal').classList.remove('hidden');
        });
    });


    function updateTotalPrice() {
        if (currentProduct) {
            const quantity = parseInt(document.getElementById('quantityInput').value) || 1;
            const total = (currentProduct.price * quantity).toFixed(2);
            document.getElementById('totalPrice').textContent = 'N' + total;
            document.getElementById('quantity').value = quantity;
            document.getElementById('totalAmount').value = total;
        }
    }

    document.getElementById('increaseQty').addEventListener('click', function(e) {
        e.preventDefault();
        const input = document.getElementById('quantityInput');
        input.value = parseInt(input.value) + 1;
        updateTotalPrice();
    });


    document.getElementById('decreaseQty').addEventListener('click', function(e) {
        e.preventDefault();
        const input = document.getElementById('quantityInput');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            updateTotalPrice();
        }
    });


    document.getElementById('quantityInput').addEventListener('change', updateTotalPrice);


    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('checkoutModal').classList.add('hidden');
    });

    document.getElementById('cancelBtn').addEventListener('click', function() {
        document.getElementById('checkoutModal').classList.add('hidden');
    });

    
    document.getElementById('checkoutModal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });

   
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('checkout_handler.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order placed successfully!');
                document.getElementById('checkoutModal').classList.add('hidden');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while placing the order.');
        });
    });
</script>

<?php include("./footer/footer.php"); ?>

</body>
</html>