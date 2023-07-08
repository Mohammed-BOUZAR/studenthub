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
                    <p class="text-muted"><i class="mdi mdi-television bred-icons"></i> <span class="bred-line">/</span>
                        Dashboard</p>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-cube text-danger icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <?php
                                $data = mysqli_query($sql_con, "SELECT COUNT(*) as count FROM teachers where status = 1");
                                if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                                $row = mysqli_fetch_assoc($data);
                                $teacherCount = $row['count'];
                                ?>
                                <p class="mb-0 text-right">Teachers</p>
                                <div class="fluid-container">
                                    <h3 class="number font-weight-medium text-right mb-0"><?php echo $teacherCount; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-receipt text-warning icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <?php
                                $data = mysqli_query($sql_con, 'SELECT COUNT(*) AS count FROM students');
                                if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                                $row = mysqli_fetch_array($data);
                                $count = $row['count'];
                                ?>
                                <p class="mb-0 text-right">Students</p>
                                <div class="fluid-container">
                                    <h3 class="number font-weight-medium text-right mb-0"><?php echo $count; ?></h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-poll-box text-success icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <?php
                                $data = mysqli_query($sql_con, 'SELECT COUNT(*) AS count FROM subscribes');
                                if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                                $row = mysqli_fetch_array($data);
                                $count = $row['count'];
                                
                                ?>
                                <p class="mb-0 text-right">Subscribes</p>
                                <div class="fluid-container">
                                    <h3 class="number font-weight-medium text-right mb-0"><?php echo $count; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->

    @include('admin.include.footer')

    <!-- POPUP WELCOME MESSAGE START -->
    <!-- Numbers count animation -->
    <script type="text/javascript" src="/adm/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="/adm/js/jquery.countup.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.number').countUp({
                delay: 10,
                time: 2000
            });
        });
    </script>
    <script src="/adm/js/jquery.bootstrap-growl.js"></script>
    <script type="text/javascript">
        $(function() {
            setTimeout(function() {
                $.bootstrapGrowl("Welcome To The Dashboard !", {
                    type: 'primary',
                    width: 'auto',
                    allow_dismiss: true
                });
            }, );
        });
    </script>
    </body>

    </html>
