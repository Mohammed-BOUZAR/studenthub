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
                    <p class="text-muted"><i class="far fa-folder-open bred-icons"></i> <span class="bred-line">/</span>
                        Helping Material</p>
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
                                    <th class="th-sm">Subject
                                    </th>
                                    <th class="th-sm">Date</th>
                                    <th class="th-sm">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                        $data = mysqli_query($sql_con,"SELECT * FROM materials where deleted_at is null");
                        if (!$data) {
                                            die('Query error: ' . mysqli_error($sql_con));
                                        }
                        while ($row = mysqli_fetch_array($data)) {
                         ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td>
                                        <?php
                                        $dep = $row['department'];
                                        $sec = $row['session'];
                                        $sem = $row['semester'];
                                        $sub = $row['subject'];
                                        $date = $row['mdate'];
                                        $file = $row['file'];
                                        
                                        $qudep = mysqli_query($sql_con, "select *from departments where id = '$dep' and deleted_at is null");
                                        if (!$qudep) {
                                            die('Query error: ' . mysqli_error($sql_con));
                                        }
                                        $rowdep = mysqli_fetch_array($qudep);
                                        
                                        $qusec = mysqli_query($sql_con, "select *from sessions where id = '$sec' and deleted_at is null");
                                        if (!$qusec) {
                                            die('Query error: ' . mysqli_error($sql_con));
                                        }
                                        $rowsec = mysqli_fetch_array($qusec);
                                        
                                        $qusem = mysqli_query($sql_con, "select *from semesters where id = '$sem' and deleted_at is null");
                                        if (!$qusem) {
                                            die('Query error: ' . mysqli_error($sql_con));
                                        }
                                        $rowsem = mysqli_fetch_array($qusem);
                                        
                                        $qusub = mysqli_query($sql_con, "select *from subjects where id = '$sub' and deleted_at is null");
                                        if (!$qusub) {
                                            die('Query error: ' . mysqli_error($sql_con));
                                        }
                                        $rowsub = mysqli_fetch_array($qusub);
                                        
                                        echo $rowdep['depname'];
                                        ?>
                                    </td>
                                    <td><?php echo $rowsec['session']; ?></td>
                                    <td><?php echo $rowsem['semester']; ?></td>
                                    <td><?php echo $rowsub['sname']; ?></td>
                                    <td><?php echo $row['mdate']; ?></td>
                                    <td>
                                        <?php
                                        
                                        $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                        if ($filetype == 'jpg' || $filetype == 'png' || $filetype == 'jpeg') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-image file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } elseif ($filetype == 'docx' || $filetype == 'doc') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-word file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } elseif ($filetype == 'ppt' || $filetype == 'pptx') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-powerpoint file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } elseif ($filetype == 'pdf') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-pdf file-icons' style='font-size:50px; color: #333'></i></a>";
                                        } elseif ($filetype == 'mp4' || $filetype == 'mkv' || $filetype == 'avi' || $filetype == '3gp') {
                                            echo "<a href = '$file' target='_blank'><i class='far fa-file-video file-icons' style='font-size:50px; color: #333'></i></a>";
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
