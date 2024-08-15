<?php
  include "config.php";
  if(isset($_GET['add'])){
    $id = $_GET['add'];
    $add = mysqli_query($conn,"INSERT INTO cart(item_id,quantity) VALUES('$id','1')");
    if(!$add){
        echo "something went wrong";
    }
  }
  $items = mysqli_query($conn,"SELECT * FROM cart INNER JOIN items ON items.id= cart.item_id");
  $total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Simple Shoppe : A Streamlined Shopping Experience</title>
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
                    <div class="title">
                        <?php echo $item['title'] ?>
                    </div>
                    <div class="cost">
                        $ <?php echo $item['cost'] ?>
                    </div>
                    <a href="delete.php?id=<?php echo $item['id_c'] ?>" class="btn">Delete</a>
                </div>
            </div>
            <?php $total += $item['cost'];?>
        <?php
            }
        ?>  
        
        </div>
        <?php
            if(mysqli_num_rows($items) > 0){
        ?>
        <h1>Total Cost : $ <?php echo $total ?></h1>
        <a href="index.php" class="btn-main">Go to Items</a>
        <form action="submit.php" method="POST">
            <div class="inputs">
                <div class="input-feild">
                    <input type="text" placeholder="Enter the name" name="name">
                </div>
                <div class="input-feild">
                    <input type="text" placeholder="Enter the mobile Number" name="mobile">
                </div>
                <div class="input-feild">   
                    <textarea placeholder="Enter the address..." name="address" rows="5" style="resize:none;"></textarea>
                </div>
                <button type="submit" class="btn">Place Order</button> 
            </div>
        </form>
        <?php
            }else{
                echo "<h1 class='main-head'>No Items found in cart. Add them <a href='./index.php'> Items</a></h1>";
            }
        ?>
    </div>
</body>
</html>