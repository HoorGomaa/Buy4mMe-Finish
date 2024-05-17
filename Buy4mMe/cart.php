<?php
session_start();
include('header.php');
include('connction.php');

// Handle adding item to cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['itemid'])) {
    $item_id = intval($_POST['itemid']);

    // Fetch item details from the database
    $query = "SELECT * FROM stuff WHERE ID = $item_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);

        // Add item to cart session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$item_id])) {
            $_SESSION['cart'][$item_id]['quantity']++;
        } else {
            $_SESSION['cart'][$item_id] = array(
                "name" => $item['name'],
                "img" => $item['img'],
                "price" => $item['price'],
                "quantity" => 1
            );
        }
    }
}
?>

<div id="content">
<div class="section page">
    <div class="wrapper">
        <h2 style="text-align: center;">Your Cart</h2>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <ul class="products" style="list-style-type: none; display: flex; flex-wrap: wrap; justify-content: center; padding: 0;">
                <?php 
                $total_price = 0; // Initialize total price
                foreach ($_SESSION['cart'] as $id => $product): 
                    $item_total = $product['price'] * $product['quantity']; // Calculate total for this item
                    $total_price += $item_total; // Add to total price
                ?>
                    <li style="margin: 20px; text-align: center;">
                        <img height="150px" width="250px" src="<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
                        <p><?php echo $product['name']; ?></p>
                        <p>SAR <?php echo number_format($product['price'], 2); ?></p>
                        <p>Quantity: <?php echo $product['quantity']; ?></p>
                        <p>Total: SAR <?php echo number_format($item_total, 2); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h3 style="text-align: center;">Total Price: SAR <?php echo number_format($total_price, 2); ?></h3>
            <div style="text-align: center;">
                <a href="#" class="button" style="padding: 10px 20px; background-color: #ffe200; color: black; text-decoration: none; font-weight: bold;">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>
</div>

<?php include('footer.php'); ?>
