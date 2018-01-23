<?php
    require 'connectdb.php';

    $pd_id = $_GET['pd_id'];

    $qdel = "SELECT pd_image FROM product WHERE pd_id='$pd_id'";
    $resdel = mysqli_query($dbcon, $qdel);
    $pd_image = mysqli_fetch_array($resdel, MYSQLI_NUM);
    $filename = $pd_image[0];

    @unlink('images/'.$filename);

    $q = "DELETE FROM product WHERE pd_id='$pd_id' ";

    $result = mysqli_query($dbcon, $q);

    if($result){
        header("Location: show_product.php");
    }else{
        echo "เกิดข้อผิดพลาดในการลบข้อมูล" .  mysqli_error($dbcon);
    }

    mysqli_close($dbcon);
