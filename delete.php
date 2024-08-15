<?php
    include "config.php";
    $id = $_GET['id'];
    $delete = mysqli_query($conn,"DELETE FROM cart WHERE id_c='$id'");
    if($delete){
        header("location: ./cart.php");
    }
?>