<?php
    $ketnoi['host'] = 'ec2-34-206-31-217.compute-1.amazonaws.com'; //Tên server, nếu dùng hosting free thì cần thay đổi
    $ketnoi['dbname'] = 'd6veukljhn49ai'; //Đây là tên của Database
    $ketnoi['username'] = 'ntdsfcrregsykn'; //Tên sử dụng Database
    $ketnoi['password'] = '35fabda0ca47320fbf2f48dcab008c70a946d9b5207b243aaaa7fce945928503';//Mật khẩu của tên sử dụng Database
    @mysql_connect(
        "{$ketnoi['host']}",
        "{$ketnoi['username']}",
        "{$ketnoi['password']}")
    or
        die("Không thể kết nối database");
    @mysql_select_db(
        "{$ketnoi['dbname']}") 
    or
        die("Không thể chọn database");
?>