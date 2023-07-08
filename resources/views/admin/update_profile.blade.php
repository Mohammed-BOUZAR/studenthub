@include('admin.include.header')

<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>
<?php
if (isset($_POST['submit'])) {
    $folder = 'profile_picture/';
    $filename = $_FILES['img']['name'];
    $unique = uniqid() . $filename;
    $temname = $_FILES['img']['tmp_name'];
    $size = $_FILES['img']['size'];

    $target = $folder . basename($unique);
    $filetype = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    if ($filetype != 'jpg' && $filetype != 'png' && $filetype != 'jpeg') {
        echo "<script>document.getElementById('imgerror').innerHTML = '** File is not an image'; </script>";
        exit();
    } elseif ($size > 2097152) {
        echo "<script>document.getElementById('imgerror').innerHTML = '** File is larger than 2MP';</script>";
        exit();
    } else {
        $data = mysqli_query($sql_con, 'select *from admins');
        if (!$data) {
            die('Query error: ' . mysqli_error($sql_con));
        }
        $row = mysqli_fetch_array($data);
        $oldpassdata = $row['password'];
        $oldpass = $_POST['oldpass'];
        $username = $_POST['username'];
        $newpassword = $_POST['newpassword'];
        $cnewpassword = $_POST['cnewpassword'];

        if ($oldpassdata != $oldpass) {
            echo "<script>alert('Current password incorrect')</script>";
            return false;
        }
        if ($cnewpassword != $newpassword) {
            echo "<script>alert('Passwords are not match')</script>";
            return false;
        }

        $data = mysqli_query($sql_con, 'select *from admins');
        if (!$data) {
            die('Query error: ' . mysqli_error($sql_con));
        }
        $row = mysqli_fetch_array($data);
        $img = $row['img'];
        if (file_exists($img)) {
            unlink($img);
        }
        move_uploaded_file($temname, $target);
        mysqli_query($sql_con, "UPDATE admins SET username='$username',password='$cnewpassword',img='$target'");
    }
    echo "<script>alert('Profile successfully updated')</script>";
    echo "<script>window.location='/'</script>";
    session_start();
    unset($_SESSION['id']);
}
?>
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12">
                <span class="d-block d-md-flex align-items-center">
                    <p class="text-muted"><i class="fas fa-user-edit bred-icons"></i> <span class="bred-line">/</span>
                        Update Profile</p>
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="panel panel2">
                    <?php
                    $data = mysqli_query($sql_con, 'select *from admins');
                    if (!$data) {
                        die('Query error: ' . mysqli_error($sql_con));
                    }
                    $row = mysqli_fetch_array($data);
                    $img = $row['img'];
                    ?>
                    <img src="<?php echo $img; ?>" alt="" class="profile-image">
                    <hr>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="update-pro-form" action="/admin/update_profile" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <input name="oldpass" type="password" class="form-control input-fields"
                                    placeholder="Current Password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="username" type="text" class="form-control input-fields"
                                    placeholder="New username" required>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="upload-profile-div">
                                    <input name="img" type="file" class="form-control" id="real-input"
                                        hidden="hidden" required>
                                    <button type="button" id="custom-button">Upload
                                    </button>
                                    <span id="custom-text">Upload Image...</span>
                                </div>
                                <span class="text-danger" id="imgerror"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="newpassword" type="password" class="form-control input-fields"
                                    placeholder="New Password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="cnewpassword" type="password" class="form-control input-fields"
                                    placeholder="Confirm Password" required>
                            </div>
                            <div class="update-btn-div">
                                <button name="submit" type="submit"
                                    class="btn btn-outline-primary btn-rounded profile-btns">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <?php
        include 'js/customUpload.js';
        ?>
        @include('admin.include.footer');

        </body>

        </html>
