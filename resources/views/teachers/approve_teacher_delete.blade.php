<?php 
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');

if(isset($_GET['value'])){
 $id = $_GET['value'];
 $data = mysqli_query($sql_con,"select *from teachers where id = '$id'");
 if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
 $row = mysqli_fetch_array($data);
 $img = $row['img'];
 if (file_exists('../'.$img)) 
               {
                 unlink('../'.$img);
             }
                 mysqli_query($sql_con,"DELETE FROM teachers WHERE id='$id'");
                 echo "<script>alert('Teacher profile Successfully Deleted')</script>";
 				 echo "<script>window.location = '../index.php'</script>";
 				 session_start();
 				 unset($_SESSION['tid']);
 }
 ?>
