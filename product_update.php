<?php
        require 'connectdb.php';

        $pd_id = $_POST['pd_id'];
        $pd_name =$_POST['pd_name'];
        $pd_price=$_POST['pd_price'];
        $pd_date=$_POST['pd_date'];
        $pd_status=$_POST['pd_status'];
        $info_id=$_POST['info_id'];

        //upload image
        $ext = pathinfo (basename($_FILES['pd_image']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'img_'.uniqid().".".$ext;
        $image_path = "images/"; 
        $upload_path = $image_path.$new_image_name;

        //uploading
        $success =  move_uploaded_file($_FILES['pd_image']['tmp_name'], $upload_path );
        if ($success == FALSE){
            echo "ไม่สามารถ updale รูปภาพได้";
            exit ();
        }

        $pd_image = $new_image_name;


        $q = "UPDATE product SET pd_name= '$pd_name', pd_price='$pd_price', pd_date='$pd_date', pd_status='$pd_status', info_id='$info_id', pd_image='$pd_image' WHERE pd_id='$pd_id' ";
        
        $result = mysqli_query($dbcon, $q);

        if($result){
            echo "แก้ไขข้อมูลเรียบร้อยแล้ว";
            echo "<hr>";
            echo "<a href='show_product.php'> แสดงข้อมูลสินค้า </a> ";
        }else{
            echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
        }

        mysqli_close($dbcon);