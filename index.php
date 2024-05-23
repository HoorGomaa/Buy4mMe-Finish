<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Slider</title>
    <style>
        .ads-title{
            text-align: center;
        }
        .slider {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slides img {
            width: 100vw;
            height: 300px;
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            width: 50px;
            height: 50px;
            margin-top: -25px;
            color: #fff;
            background-color: #ffe200;
            cursor: pointer;
            border: none;
            z-index: 1000;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>
<body>
    <?php include('header.php') ?>
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
            <div class="section shirts latest" style="margin:0 auto;width:80%">
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
    </div>

    <h2 class="ads-title">Advertise Now!</h2>
    <div class="slider">
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <div class="slides">
            <img src="https://www.thetimes.co.uk/imageserver/image/%2Fmethode%2Ftimes%2Fprod%2Fweb%2Fbin%2F049f79b0-ef5d-11ed-b02d-cefaa3091195.jpg?crop=1600%2C900%2C0%2C0&resize=360" alt="Ad 1">
            <img src="https://static.toiimg.com/photo/105721384.cms" alt="Ad 2">
            <img src="https://www.fittr.com/static-content/diet_plan_3867d0b85b.webp" alt="Ad 3">
            <img src="https://www.beyond-nutrition.ae/wp-content/uploads/2023/03/meal-planning-notepad-food-assortment.jpg" alt="Ad 4">
        </div>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>

    <?php include('calcBMI.php') ?>
    <?php include('footer.php') ?>

    <script src="js/index.js"></script>
</body>
</html>
