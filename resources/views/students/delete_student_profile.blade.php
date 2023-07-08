<?php 
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');

if(isset($_GET['value'])){
 $id = $_GET['value'];
 $data = mysqli_query($sql_con,"select *from students where id = '$id'");
 $row = mysqli_fetch_array($data);
 $img = $row['img'];
 if (file_exists('../'.$img)) 
               {
                 unlink('../'.$img);
             }
                 mysqli_query($sql_con,"DELETE FROM students WHERE id='$id'");
                 echo "<script>alert('Student profile Successfully Deleted')</script>";
 				 session_start();
 				 unset($_SESSION['sid']);
 				 echo "<script>window.location = '../index.php'</script>";
 				 
 }
 ?>
