<?php
    require 'connectdb.php';

    $q = "SELECT * FROM infotype";

    $result = mysqli_query($dbcon, $q);

    if ($result) {
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "ลำดับ : ". $row['info_id']."<br>";
            echo "ชื่อ : ". $row['info_name']. "<br>";
            echo "e-mail : " . $row['info_email']. "<br>";
            echo "<hr>";
        }

    }else {
        echo "ไม่สามารถแสดงข้อมูลได้ เกิดข้อผิดพลาด";
    }