@include('admin.include.header')

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
                    <p class="text-muted"><i class="fas fa-user-clock bred-icons"></i> <span class="bred-line">/</span>
                        Update Semester</p>
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="panel panel2">
                    <form class="update-pro-form" method="post" action="/admin/update_semester/{{ $id }}">
                        @csrf
                        <label>Update semester</label>
                        <?php
                        // $id = $_GET['value'];
                        $data = mysqli_query($sql_con, "SELECT *from semesters where id = '$id' and deleted_at is null");
                        $row = mysqli_fetch_array($data);
                        ?>
                        <input value="<?php echo $row['semester']; ?>" name="semester" type="text" class="col-sm-12 form-control"
                            placeholder="Enter semester"></input><br>
                        <center>
                            <input name="submit" type="submit"
                                class="btn btn-outline-primary btn-rounded profile-btns" value="Update Semester">
                            <br><br>
                        </center>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('admin.include.footer');

        </body>

        </html>
        <?php
        if (isset($_POST['submit'])) {
            if (isset($_GET['value'])) {
                $id = $_GET['value'];
                $semester = $_POST['semester'];
                mysqli_query($sql_con, "UPDATE semester set semester = '$semester' where id = '$id'");
                echo "<script>alert('Semester updated successfully')</script>";
                echo "<script>window.location = 'manage_semester'</script>";
            } else {
                echo "<script>alert('Go back and try again something wrong')</script>";
                echo "<script>window.location = 'manage_semester'</script>";
            }
        }
        ?>
