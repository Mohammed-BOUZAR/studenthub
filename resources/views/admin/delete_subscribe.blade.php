<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');

if (isset($_GET['value'])) {
    $id = $_GET['value'];
    mysqli_query($sql_con, "DELETE from subscribes where id = '$id'");
    echo "<script>alert('Email Successfully Deleted')</script>";
    echo "<script>window.location = 'subscribes'</script>";
}
?>
