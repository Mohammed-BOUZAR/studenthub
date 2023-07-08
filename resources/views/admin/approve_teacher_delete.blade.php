<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>

@if (isset($_GET['value']))
    @php
        $id = $_GET['value'];
        $status = 1;
        $data = mysqli_query($sql_con, "select *from teachers where id = '$id'");
        $row = mysqli_fetch_array($data);
        $img = $row['img'];
        if (file_exists('../' . $img)) {
            unlink('../' . $img);
        }
        mysqli_query($sql_con, "DELETE FROM teachers WHERE id='$id'");
        echo '<script>
            alert('Teacher profile Successfully Deleted')
        </script>';
        echo '<script>
            window.location = 'teacher_profile'
        </script>';
    @endphp
@endif
