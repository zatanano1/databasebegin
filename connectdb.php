<?php
    $dbcon = mysqli_connect('localhost','root','root','dbinfo') or die('ไม่สามารถติดต่อฐานข้อมูลได้'. mysqli_connect_error());

    mysqli_set_charset($dbcon, 'utf8');