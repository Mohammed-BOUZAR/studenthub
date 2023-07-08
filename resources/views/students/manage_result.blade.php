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
                    <p class="text-muted"><i class="fas fa-copy bred-icons"></i> <span class="bred-line">/</span> Result
                    </p>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel2">
                    <div class="table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">ID
                                    </th>
                                    <th class="th-sm">Department
                                    </th>
                                    <th class="th-sm">Session
                                    </th>
                                    <th class="th-sm">Semester
                                    </th>
                                    <th class="th-sm">Date</th>
                                    <th class="th-sm">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                          $data = mysqli_query($sql_con,"select *from results");
                          if (!$data) {
                              die('Query error: ' . mysqli_error($sql_con));
                          }
                          while ($row = mysqli_fetch_array($data)) {

                            $depid = $row['department'];
                            $depdata = mysqli_query($sql_con,"select *from departments where id = '$depid'");
                            if (!$depdata) {
                              die('Query error: ' . mysqli_error($sql_con));
                          }
                            $deprow = mysqli_fetch_array($depdata);
                            $depname = $deprow['depname'];

                            $secid = $row['session'];
                            $secdata = mysqli_query($sql_con,"select *from sessions where id = '$secid'");
                            if (!$secdata) {
                              die('Query error: ' . mysqli_error($sql_con));
                          }
                            $secrow = mysqli_fetch_array($secdata);
                            if (!$secrow) {
                              die('Query error: ' . mysqli_error($sql_con));
                          }
                            $secname = $secrow['session'];

                            $semid = $row['semester'];
                            $semdata = mysqli_query($sql_con,"select *from semesters where id = '$semid'");
                            if (!$semdata) {
                              die('Query error: ' . mysqli_error($sql_con));
                          }
                            $semrow = mysqli_fetch_array($semdata);
                            $semname = $semrow['semester'];

                           ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $depname; ?></td>
                                    <td><?php echo $secname; ?></td>
                                    <td><?php echo $semname; ?></td>
                                    <td><?php echo $row['rdate']; ?></td>
                                    <td>
                                        <?php
                                        $file2 = $row['file'];
                                        $file = '../admin/' . $file2;
                                        $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                        if ($filetype == 'jpg' || $filetype == 'png' || $filetype == 'jpeg') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-image file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } elseif ($filetype == 'docx' || $filetype == 'doc') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-word file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } elseif ($filetype == 'pdf') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-pdf file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } elseif ($filetype == 'pptx' || $filetype == 'ppt') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-powerpoint file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } else {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-alt file-icons' style='font-size:50px; color: #333'></i></a>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('students.include.footer');

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
        </body>

        </html>
