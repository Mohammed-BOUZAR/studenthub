@include('teachers.include.header')
<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12">
                <span class="d-block d-md-flex align-items-center">
                    <p class="text-muted"><i class="mdi mdi-key bred-icons"></i> <span class="bred-line">/</span> Change
                        Password</p>
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="panel panel2">
                    <form class="update-pro-form" method="post" accept=""
                        action="/teachers/change_password/{{ session('tid') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <input name="oldpass" type="password" class="form-control input-fields"
                                    placeholder="Enter Old Password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="newpass" type="password" class="form-control input-fields"
                                    placeholder="Enter New Password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="cpass" type="password" class="form-control input-fields"
                                    placeholder="Confirm Password" required>
                            </div>
                            <div class="update-btn-div">
                                <button name="submit" type="submit"
                                    class="btn btn-outline-primary btn-rounded profile-btns">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->




        @include('teachers.include.footer');



        </body>

        </html>
        <?php
        if (isset($_POST['submit'])) {
            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            $cpass = $_POST['cpass'];
            $id = $_SESSION['tid'];
            $data = mysqli_query($sql_con, "select password from teachers where id = '$id'");
            $row = mysqli_fetch_array($data);
            $dbpass = $row['password'];
            if ($oldpass != $dbpass) {
                echo "<script>alert('Old password is invalid')</script>";
                exit();
            }
            if ($newpass != $cpass) {
                echo "<script>alert('Passwords are not matched')</script>";
                exit();
            }
            mysqli_query($sql_con, "UPDATE teachers SET password = '$cpass' where id = '$id'");
            echo "<script>alert('Password successfully updated')</script>";
            echo "<script>window.location='../teacherlogin.php'</script>";
            session_start();
            unset($_SESSION['tid']);
        }
        ?>
