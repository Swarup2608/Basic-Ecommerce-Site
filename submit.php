<?php
    include "config.php";
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $sql = mysqli_query($conn,"SELECT * FROM address WHERE name='$name' and $mobile='$mobile' and address='$address'");
    if(mysqli_num_rows($sql)){
        $address_id = mysqli_fetch_assoc($sql)['id'];
    }
    else{
        $sql1 = mysqli_query($conn,"INSERT INTO address(name,mobile,address) Values('$name','$mobile','$address')");
    }
    
    $sql2 = mysqli_query($conn,"SELECT * FROM address WHERE name='$name' and $mobile='$mobile' and address='$address'");
    if(mysqli_num_rows($sql2)){
        
        $address_id = mysqli_fetch_assoc($sql2)['id'];
    }
    $items = mysqli_query($conn,"SELECT * FROM cart");
    while($item = mysqli_fetch_assoc($items)){
        $id1 = $item['item_id'];
        $id = $item['id_c'];
        $main = mysqli_query($conn,"INSERT INTO orders(item_id,address_id,status) VALUES($id1,$address_id,'Order Placed')");
        $delete = mysqli_query($conn,"DELETE FROM cart WHERE id_c='$id'");
    }
    header("location: orders.php");
?>