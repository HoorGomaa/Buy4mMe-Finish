<?php $title = "Item"; ?>
<?php include('header.php'); ?>
<?php include('connction.php'); ?>
<?php session_start(); ?>

<?php
// Get the item ID from the URL
$item_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch item details from the database
$query = "SELECT * FROM stuff WHERE ID = $item_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $item = mysqli_fetch_assoc($result);
} else {
    // Handle the case where the item is not found
    $item = null;
}
?>

<div id="content">
<div class="section page">
    <div class="wrapper">
        <?php if ($item): ?>
            <div class="shirt-picture">
                <span>
                    <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>">
                </span>
            </div>
            <div class="shirt-details">
                <h1><?php echo $item['name']; ?></h1>
                <h1><span class="price">SAR <?php echo number_format($item['price'], 2); ?></span></h1>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="itemid" value="<?php echo $item_id; ?>"/>
                    <input type="submit" value="Add to Cart" name="submit">
                </form>
            </div>
        <?php else: ?>
            <p>Item not found.</p>
        <?php endif; ?>
    </div>
</div>
</div>

<?php include('footer.php'); ?>
