<?php
        require 'connectdb.php';

        $q = "SELECT * FROM product INNER JOIN infotype ON product.info_id=infotype.info_id";

        $result = mysqli_query($dbcon, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>อวดตาราง</title>
    <style>
        table,th ,td{
            border : 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h2>รายการสินค้า</h2>
    <table style="width: 900px" >
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>วันที่เพิ่ม</th>
                <th>หมวดสินค้า</th>
                <th>รูปภาพ</th>
                <th>สถานะ</th>
                <!-- <th>แก้ไข</th> -->
                <th>ลบ</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['pd_id']; ?> </td>
                <td><?php echo $row['pd_name']; ?></td>
                <td><?php echo number_format($row['pd_price'],2); ?></td>
                <td><?php echo $row['pd_date']; ?></td>
                <td><?php echo $row['info_name']; ?></td>
                <td><img src="images/<?php echo $row['pd_image']; ?>" width="100px" height="100px" > </td>
                <!-- <?php if ($row['pd_status'] == 0 ){ ?> -->
                    <!-- <td><?php echo "ใช้ซื้อขายได้"; ?></td> -->
                <!-- <?php }else{ ?> -->
                    <!-- <td><?php echo "อยู่ระหว่างปรับปรุง"; ?></td> -->
                <!-- <?php } ?> -->


                <td><a href= "update_product_frm.php?pd_id=<?php echo $row['pd_id']; ?>" >แก้ไข</a></td>
                <td><a href= "delete_product.php?pd_id=<?php echo $row['pd_id']; ?>" >ลบ</a></td>
            </tr>

                <?php
                   }
                   mysqli_free_result($result);
                   mysqli_close($dbcon);
                ?>
    </table>
</body>
</html>