@include('students.include.header');
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
                    <p class="text-muted"><i class="mdi mdi-account-circle bred-icons"></i> <span
                            class="bred-line">/</span> Profile</p>
                </span>
            </div>
        </div>
        <div class="row">
            <?php
            $id = session('sid');
            $data = mysqli_query($sql_con, "Select *from students where id ='$id'");
            if (!$data) {
                die('Query error: ' . mysqli_error($sql_con));
            }
            $row = mysqli_fetch_array($data);
            
            $depid = $row['dep'];
            $depdata = mysqli_query($sql_con, "select *from departments where id = '$depid'");
            if (!$depdata) {
                die('Query error: ' . mysqli_error($sql_con));
            }
            $deprow = mysqli_fetch_array($depdata);
            
            $secid = $row['session'];
            $secdata = mysqli_query($sql_con, "select *from sessions where id = '$secid'");
            if (!$secdata) {
                die('Query error: ' . mysqli_error($sql_con));
            }
            $secrow = mysqli_fetch_array($secdata);
            ?>
            <div class="user-profile">
                <img src="/storage/{{ $student->img }} " alt="">
                <p class="hello-user">Hello <br><span class="user-name">{{ $student->firstname }}
                        {{ $student->lastname }}
                        </span></p>
                <p class="user-info-heading">account Information</p>
                <div class="user-details">
                    <p>First Name: <span class="details-text">{{ $student->firstname }}</span></p>
                    <p>Last Name: <span class="details-text">{{ $student->lastname }}</span></p>
                    <p>Father Name: <span class="details-text">{{ $student->fathername }}</span></p>
                    <p>Roll Number: <span class="details-text">{{ $student->rollnum }}</span></p>
                    <p>Email Address: <span class="details-text">{{ $student->stdemail }}</span></p>
                    <p>Session: <span class="details-text"><?php echo $secrow['session']; ?></span></p>
                    <p>Gender: <span class="details-text">{{ $student->gender }}</span></p>
                    <p>Department: <span class="details-text"><?php echo $deprow['depname']; ?></span></p>
                    <p>Phone Number: <span class="details-text">{{ $student->snumber }}</span></p>
                    <p>Address: <span class="details-text">{{ $student->address }}</span></p>
                    <a href="update_student_profile"><button
                            class="btn btn-outline-primary btn-rounded profile-btns">Update Profile</button></a>
                    <a href="" data-toggle="modal" data-target="#exampleModaldep{{ $student->id }} "><button
                            class="btn btn-outline-danger btn-rounded profile-btns btn-delete-pro">Delete
                            Profile</button></a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModaldep{{ $student->id }} " tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete an account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you really want to delete your account?
                                </div>
                                <div class="modal-footer">
                                    <a href="delete_student_profile?value={{ $student->id }}"
                                        class="btn btn-primary">YES</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br> <br>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->




        @include('students.include.footer');


        </body>

        </html>
