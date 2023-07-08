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
                    <p class="text-muted"><i class="fas fa-university bred-icons"></i> <span class="bred-line">/</span> Add
                        Department</p>
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="panel panel2">
                    <form class="update-pro-form" action="/admin/add_department" method="post">
                        @csrf
                        <label>Add new department</label>
                        <input name="department" type="text"class="col-sm-12 form-control"
                            placeholder="Enter Department Name"></input><br>
                        <center>
                            <button name="submit" type="submit"
                                class="btn btn-outline-primary btn-rounded profile-btns">Add Department</button>
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
            $department = $_POST['department'];
            mysqli_query($sql_con, "INSERT INTO departments (depname) VALUES ('$department')");
            echo "<script>alert('New department added successfully')</script>";
        }
        ?>
