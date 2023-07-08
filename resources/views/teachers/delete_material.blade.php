<?php 
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');

if (isset($_GET['value'])) {
	$id = $_GET['value'];
	$data = mysqli_query($sql_con,"SELECT * FROM material WHERE id='$id'");
	if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
	$row = mysqli_fetch_array($data);
	$file = $row['file'];
	if (file_exists($file)) {
		unlink($file);
	}
	mysqli_query($sql_con,"DELETE from material where id = '$id'");
	echo "<script>alert('Material successfully deleted')</script>";
	echo "<script>window.location='manage_material.php'</script>";
}
 ?>