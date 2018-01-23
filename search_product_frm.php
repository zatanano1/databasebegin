<?php
    require 'connectdb.php';

    $pd_search = $_POST['pd_search'];

    $p = '%' . $pd_search . '%';

    $q= "SELECT * FROM product WHERE pd_name LIKE '$p'";
    $result =mysqli_query($dbcon, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            table,th,td{
                border: 1px solid black;
                border-collapse : collapse;
            }
    </style>
</head>
<body>
    <h2>ค้นหาข้อมูลสินค้า</h2>
    <form action="search_product_frm.php" method="post">
            <label>ชื่อสินค้า: </label><input type="text" size="40px" name="pd_search" />
            <input name="submit" type="submit" id="submit" value="ค้นข้อมูล">
    </form>
    <br>
    <table style= "width: 500px">
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
            </tr>
            <?php
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['pd_id']; ?></td>
                <td><?php echo $row['pd_name']; ?></td>
                <td><?php echo number_format ($row['pd_price'],2); ?></td>
            </tr>
                <?php 
                    }
                ?>
    </table>
</body>
</html>