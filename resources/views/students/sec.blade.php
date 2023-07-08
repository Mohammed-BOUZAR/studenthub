<html>
<?php 
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');


	$sec = $_POST['value'];
	$data = mysqli_query($sql_con,"select *from semester where session = '$sec'");
 ?>
 <option value="">Choose</option>
 <?php 
 while($row = mysqli_fetch_array($data)){ 	
  ?>
	<option value="<?php echo $row['id']; ?>"><?php echo $row['semester']; ?></option>

  <?php 
  } 
  ?>
</html>
