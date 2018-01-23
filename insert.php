<?php
    require 'connectdb.php';

    $info_name = 'หมวก';

    $query = "INSERT INTO infotype (info_id , info_name) VALUES ('','$info_name') ";

    $result = mysqli_query($dbcon, $query);

    if ($result){
        echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
    }else{
        echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
    }