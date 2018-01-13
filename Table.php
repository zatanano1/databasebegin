<?php
        // connect database
        require 'connectdb.php';
        $q = "SELECT * FROM infotype";
        $result = mysqli_query($dbcon, $q);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ตารางโง่ๆ</title>
    <style>
        /* html or css  ต้องเรียนรู้เพิ่ม */
        table,th,td {
            border: 1px solid black;
            border-collapse: collapse;
        }    
    </style>
</head>
<body>
    <table style="width: 600px">
            <!-- row 1 -->
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>e-mail</th>
        </tr>
            <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            ?>
                    <!--row 2  -->
            <tr>
                <td><?php echo $row['info_id']; ?></td>
                <td><?php echo $row['info_name'];  ?></td>
                <td><?php echo $row['info_email'];  ?></td>
            </tr>
                <?php  }   
                        //close database
                        
                        mysqli_free_result($result);  
                        mysqli_close($dbcon);              
                ?>    
    </table>
</body>
</html>