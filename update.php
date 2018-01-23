<?php 
        require 'connectdb.php';

        $pd_id = 1 ;
        $pd_name = "เสื้อลายดอก";

        $q = "UPDATE product SET pd_name='$pd_name' WHERE pd_id='$pd_id' ";

        $result = mysqli_query($dbcon, $q);

        if ($result) {
                echo "แก้ไขข้อมูลเรียบร้อย";
        }else{
            echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
        }

        mysqli_close($dbcon);
        ?>