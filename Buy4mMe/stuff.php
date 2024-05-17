<?php include('header.php')?>
<?php include('connction.php') ?>
<div class="page shirts section">
<div class="wrapper">

<h2>ALL Programms</h2>
<div class="section shirts latest">
    
<?php 
$stuff = array();
$query = 'SELECT * FROM stuff';
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result))
{
  $stuff[$row['ID']] = array(
    "name" => $row['name'],
    "img" => $row['img'],
    "price" => $row['price']
  );
}
?>

<ul class="products" style="padding: 10px;margin:auto;width:100%">
    <?php 
    foreach ($stuff as $key => $value) {
        echo '<li>
                <a href="item.php?id='. $key .'">
                    <img height="150px" width:"150px" src="'.$value["img"].'" alt="'.$value["name"].'">
                </a>
                <div style="height:60px"><p>' . $value["name"] . '</p></div>
                <span style="color: #ffe200;font-weight:bold;font-size:20px">' . number_format($value["price"], 2) .  '</span>
                <span style="color: #ffe200;font-weight:bold;font-size:20px;text-transform:uppercase">SAR</span>
              </li>';
    }
    ?>
</ul>
</div>

</div>
<?php include('footer.php') ?>
