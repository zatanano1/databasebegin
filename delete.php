<?php
    require 'connectdb.php';

    $pd_id = 2;

    $q = "DELETE FROM product WHERE pd_id='$pd_id'";
    $result = mysqli_query($dbcon, $q);

    if($result){
        echo "ลบข้อมูลเรียบร้อย";
    }else{
        echo "เกิดข้อผิดพลาดในการลบข้อมูล". mysqli_error($dbcon);
    }

    mysqli_close($dbcon);