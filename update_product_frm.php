<?php
    require 'connectdb.php';

    $pd_id = $_GET['pd_id'];
    $qpro = "SELECT * FROM product WHERE pd_id= '$pd_id'"; 
    $respro = mysqli_query($dbcon, $qpro);
    $rowpro = mysqli_fetch_array($respro, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูลสินค้า</title>
    <style>
            label {
                    display: block;
            }
    </style>
</head>
<body>
    <h2>แก้ไขข้อมูลสินค้า</h2>
<form action="product_update.php" method="post" enctype="multipart/form-data" id="form1" >
            <fieldset>
            <legend>แก้ไขสินค้า</legend>
                    <label>ชื่อสินค้า</label><input name="pd_name" type="text" id="pd_name" siza="40" value = "<?php echo $rowpro['pd_name']; ?>">
                    <label>ราคา</label><input name="pd_price" type="text" id="pd_price" size="20" value = "<?php echo $rowpro['pd_price']; ?>">
                    <label>วันที่เพิ่มสินค้า</label><input name="pd_date" type="date" id="pd_date" value = "<?php echo $rowpro['pd_date']; ?>">
                    <label>สถานะสินค้า</label>
                    <label>
                        <input type="radio" name="pd_status" value="0" id="pd_status_0" <?php if ($rowpro['pd_status'] == '0') echo "checked"; ?>>
                        ใช้ซื้อขายได้</label>
                    <label>
                        <input type="radio" name="pd_status" value="1" id="pd_status_1" <?php if ($rowpro['pd_status'] == '1') echo "checked"; ?>>
                        อยู่ระหว่างปรับปรุง</label>
                    <label>ประเภทสินค้า</label>
                    <?php
                        $q = "SELECT * FROM infotype";
                        $result = mysqli_query($dbcon, $q);
                    ?>
                    <select name="info_id" id="info_id">

                        <?php
                                while ($row = mysqli_fetch_array($result, MYSQLI_NUM) ) {
                                        if ($row[0] == $rowpro['info_id']) {
                                            echo "<option value='$row[0]'selected>$row[1]</option>";
                                        }else{
                                            echo "<option value='$row[0]'>$row[1]</option>";
                                        }
                                }
                        ?>
                    </select>
                    <label>รูปภาพสินค้า</label>
                    <input type="file" name="pd_image" />
                    <br><br>
                    <input type="hidden" name="pd_id" value=<?php echo $rowpro['pd_id']; ?> >
                    <input name="submit" type="submit" id="submit" value="แก้ไขข้อมูล">

            </fieldset>
    </form>
</body>
</html>