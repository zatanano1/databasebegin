<?php
    require 'connectdb.php';

    $info_name = 'ปธิทาน';
    $info_email = 'boatdk@gmail.com';

    $query = "INSERT INTO infotype (info_id , info_name,info_email) VALUES ('','$info_name','$info_email') ";

    $result = mysqli_query($dbcon, $query);

    if ($result){
        echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
    }else{
        echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
    }