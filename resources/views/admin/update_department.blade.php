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
                    <p class="text-muted"><i class="fas fa-university bred-icons"></i> <span class="bred-line">/</span>
                        Update Department</p>
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="panel panel2">
                    <form class="update-pro-form" action="/admin/update_department/{{ $id }}" method="post">
                      @csrf  
                      <label>Update department</label>
                        <?php
                        // $id = $_GET['value'];
                        $data = mysqli_query($sql_con, "select *from departments where id ='$id' and deleted_at is null");
                        $row = mysqli_fetch_array($data);
                        ?>
                        <input value="<?php echo $row['depname']; ?>" name="department"
                            type="text"class="col-sm-12 form-control"
                            placeholder="Enter Department Name"></input><br>
                        <center>
                            <button name="submit" type="submit"
                                class="btn btn-outline-primary btn-rounded profile-btns">Update Department</button>
                            <br><br>
                        </center>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('admin.include.footer')

        </body>

        </html>
        <?php
        if (isset($_POST['submit'])) {
            if (isset($_GET['value'])) {
                $department = $_POST['department'];
                $id = $_GET['value'];
                mysqli_query($sql_con, "UPDATE departments set depname = '$department' where id ='$id'");
                echo "<script>alert('Department updated successfully')</script>";
                echo "<script>window.location = 'manage_department'</script>";
            } else {
                echo "<script>alert('Go Back and try again something wrong')</script>";
                echo "<script>window.location = 'manage_department'</script>";
            }
        }
        ?>
