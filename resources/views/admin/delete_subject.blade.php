<?php 
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');

	$value = $_GET['value'];
	echo $value;
	mysqli_query($sql_con,"DELETE From subjects where id = '$value'");
	echo "<script>alert('Subject deleted successfully')</script>";
	echo "<script>window.location='manage_subject'</script>";
 ?>