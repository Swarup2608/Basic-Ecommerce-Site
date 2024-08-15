<?php
  include "config.php";
  $items = mysqli_query($conn,"SELECT * FROM items");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Shoppe : A Streamlined Shopping Experience</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="main">
        <h1>Simple Shoppe : A Streamlined Shopping Experience</h1>
        <div style="display:flex;">
            <a href="cart.php"  style=" margin-left:5px; margin-right:10px"class="btn-main">Go to Cart</a>
            <a href="orders.php"  style=" margin-left:10px; margin-right:5px" class="btn-main">Go to orders</a>
        </div>
        <div class="items">
        <?php
            while($item = mysqli_fetch_assoc($items)){
        ?>
            <div class="item">
                <div class="image-container">
                    <img src="./images/<?php echo $item['img_url'] ?>" alt="">
                </div>
                <div class="data-container">
                    <div class="title">
                        <?php echo $item['title'] ?>
                    </div>
                    <div class="cost">
                        $ <?php echo $item['cost'] ?>
                    </div>
                        <a href="cart.php?add=<?php echo $item['id'] ?>" class="btn">Add to Cart</a>
                </div>
            </div>
        <?php
            }
        ?>  
        </div>
    </div>
    
</body>
</html>