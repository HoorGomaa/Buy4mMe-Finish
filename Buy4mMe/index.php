<?php include('header.php')?>
<?php include('connction.php') ?>

<div class="section banner" style="background: url('img/bg.jpg') center repeat;">
    <div class="wrapper">
        <img class="hero" src="img/file.png" alt="Anonymous says:" style="top:30px;left:0">
        <div style="background: #ffe200;border:none;left:72%" class="button">
            <a onmouseover="this.style.color='#000'" onmouseout="this.style.color='#fff'" href="stuff.php">
                <h2>Hey Guys,</h2>
                <p style="color:#000">Check Out Our Services</p>
            </a>
        </div>
    </div>
</div>

<div class="page shirts section">
<div class="wrapper">

<h2>Our Latest Programms</h2>
<div class="section shirts latest"  style="margin:0 auto;width:80%">
    
<?php 
$stuff = array();
$query = 'SELECT * FROM stuff ORDER BY ID DESC LIMIT 4'; // Fetch latest 4 items
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $stuff[$row['ID']] = array(
    "name" => $row['name'],
    "img" => $row['img'],
    "price" => $row['price']
  );
}
?>

<ul class="products" style="padding: 10px; display: flex; justify-content: space-between;">
    <?php 
    foreach ($stuff as $key => $value) {
        echo '<li style="list-style-type: none; text-align: center; margin: 10px;">
                <a href="item.php?id='. $key .'">
                    <img height="150px" width="150px" src="'.$value["img"].'" alt="'.$value["name"].'">
                </a>
                <div style="height:60px"><p>' . $value["name"] . '</p></div>
                <span style="color: #ffe200;font-weight:bold;font-size:20px">' . number_format($value["price"], 2) .  '</span>
                <span style="color: #ffe200;font-weight:bold;font-size:20px;text-transform:uppercase">SAR</span>
              </li>';
    }
    ?>
</ul>
<div style="text-align: center; margin-top: 50px;">
    <a href="stuff.php" class="button" style="padding: 10px 20px; background-color: #ffe200; color: black; text-decoration: none; font-weight: bold;">View All Programms</a>
</div>
</div>

</div>
<?php include('footer.php') ?>
