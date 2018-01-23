<?php 
        require 'connectdb.php';


        if (empty($_POST['pd_name'] )) {
                echo "กรุณากรอกข้อมูลสินค้า";
                exit();
        }


        $pd_name = $_POST['pd_name'];
        $pd_price = $_POST['pd_price'];
        $pd_date = $_POST['pd_date'];
        $pd_status = $_POST['pd_status'];
        $info_id = $_POST['info_id'];


        //upload image
        $ext = pathinfo (basename($_FILES['pd_image']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'img_'.uniqid().".".$ext;
        $image_path = "images/"; 
        $upload_path = $image_path.$new_image_name;

        //uploading
        $success =  move_uploaded_file($_FILES['pd_image']['tmp_name'], $upload_path );
        if ($success == FALSE){
            echo "ไม่สามารถ upload รูปภาพได้";
            exit ();
        }

        $pd_image = $new_image_name;

    $q = "INSERT INTO product(pd_name,pd_price,pd_date,pd_status,info_id,pd_image) VALUES ('$pd_name','$pd_price','$pd_date','$pd_status','$info_id','$pd_image') ";


    $result = mysqli_query($dbcon, $q);

    if ($result){
        echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
    }else{
        echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_errno($dbcon);
    }
    mysqli_close($dbcon);
?>