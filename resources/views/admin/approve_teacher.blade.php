<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>


@php
    $id = $_GET['value'];
    $status = 1;
    mysqli_query($sql_con, "update teachers set status = '$status' where id = '$id'");
    echo '<script>
        window.location = 'teacher_pending'
    </script>';
@endphp
