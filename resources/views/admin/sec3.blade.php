<html>
<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');

$sem = $_POST['value'];
$data = mysqli_query($sql_con, "SELECT * FROM subjects WHERE  semester  ='$sem'");
?>
<option value="">Choose</option>
<?php 
 while($row = mysqli_fetch_array($data)){ 	
  ?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['sname']; ?></option>

<?php 
  } 
  ?>

</html>
