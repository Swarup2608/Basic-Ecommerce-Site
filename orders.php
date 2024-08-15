<?php
  include "config.php";
  $items = mysqli_query($conn,"SELECT * FROM (orders INNER JOIN items ON orders.item_id=items.id)INNER JOIN address ON orders.address_id=address.id");
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
        <div class="items">
        <?php
            while($item = mysqli_fetch_assoc($items)){
        ?>
            <div class="item">
                <div class="image-container">
                    <img src="./images/<?php echo $item['img_url'] ?>" alt="">
                </div>
                <div class="data-container">
                    <div class="title" title="<?php echo $item['address']?>" style="cursor:pointer">
                        <?php echo substr($item['address'],0,20);if(strlen($item['address'])> 20){ echo "...";}?>
                    </div>
                    <div class="cost">
                        <?php echo $item['Name'] ?>
                    </div>
                    <div class="cost">
                        <?php echo $item['mobile'] ?>
                    </div>
                    <div class="cost">
                        Order Placed on : <?php echo $item['stamp'] ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>  
        </div>
        <?php
        if(mysqli_num_rows($items) > 0){
        ?>
            <a href="index.php" class="btn-main">Go to Items</a>  
        <?php
        }else{
            echo "<h1 class='main-head'>No items found in orders. Add them <a href='./index.php'> Items</a></h1>";
            
        }
        ?>
    </div>
    
</body>
</html>