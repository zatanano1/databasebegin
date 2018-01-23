<?php
        require 'connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูล</title>
    <style>
            label {
                    display: block;
            }
    </style>
</head>
<body>
    <h2>ข้อมูลสินค้า</h2>

    <form action="product_insert.php" method="post" enctype="multipart/form-data" id="form1" >
            <fieldset>
            <legend>เพิ่มสินค้า</legend>
                    <label>ชื่อสินค้า</label><input name="pd_name" type="text" id="pd_name" siza="40">
                    <label>ราคา</label><input name="pd_price" type="text" id="pd_price" size="20">
                    <label>วันที่เพิ่มสินค้า</label><input name="pd_date" type="date" id="pd_date">
                    <label>สถานะสินค้า</label>
                    <label><input type="radio" name="pd_status" value="0" id="pd_status_0">
                        ใช้ซื้อขายได้</label>
                    <label><input type="radio" name="pd_status" value="1" id="pd_status_1">
                        อยู่ระหว่างปรับปรุง</label>
                    <label>ประเภทสินค้า</label>
                    <?php
                        $q = "SELECT * FROM infotype";
                        $result = mysqli_query($dbcon, $q);
                    ?>
                    <select name="info_id" id="info_id">
                        <option value="">---เลือกประเภทสินค้า---</option>
                        <?php
                                while ($row = mysqli_fetch_array($result, MYSQLI_NUM) ) {
                                        echo "<option value='$row[0]'>$row[1]</option>";

                                }
                        ?>
                    </select>
                    <label>รูปภาพสินค้า</label>
                    <input type="file" name="pd_image" />
                    <br><br>

                    <input name="submit" type="submit" id="submit" value="เพิ่มข้อมูล">

            </fieldset>
    </form>
</body>
</html>