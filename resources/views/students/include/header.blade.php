<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Hub</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="/student/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/student/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/student/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" type="text/css" href="/student/css/all.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" type="text/css" href="/student/css/fileinput.css">
    <script src="/student/js/jquery-3.3.1.min.js"></script>
    <script src="/student/js/fileinput.js" type="text/javascript"></script>
    <script src="/student/js/theme.js" type="text/javascript"></script>


    <link rel="stylesheet" href="/student/css/style.css">
    <link rel="stylesheet" type="text/css" href="/student/css/custom.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/student/images/HeadLogo.png" />
    <style type="text/css">
        .fileinput-cancel-button {
            display: none;
        }

        .fileinput-upload-button {
            display: none;
        }

        .close {
            padding-top: 5px !important;
            padding-right: 5px !important;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="dashboard">
                    <img src="/student/images/Logo.png" alt="logo" style="height: auto">
                </a>
                <a class="navbar-brand brand-logo-mini" href="dashboard">
                    <img src="/student/images/HeadLogo.png" alt="logo"style="width: 60px;height: auto">
                </a>
            </div>
            <a class="logout-para" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-power-off"></i>
                Logout</a>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title profile-btns" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body profile-btns">
                        Do you really want to logout?
                    </div>
                    <div class="modal-footer">
                        <a href="logout"><button type="button"
                                class="btn btn-outline-primary btn-rounded profile-btns">Yes</button></a>
                        <button type="button" class="btn btn-outline-danger btn-rounded profile-btns"
                            data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link" style="padding-bottom: 0px">
                            <div class="user-image">
                                <?php
                                $sid = session('sid');
                                $data = mysqli_query($sql_con, "select *from students where id ='$sid'");
                                if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                                $row = mysqli_fetch_array($data);
                                $id = $row['id'];
                                $img = $row['img'];
                                ?>
                                <img src="<?php echo '/storage/' . $img; ?>" alt="">
                            </div>
                            <br>
                            <div class="user-info">
                                <?php
                                $data = mysqli_query($sql_con, "select * from students where id = '$sid'");
                                if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                                $row = mysqli_fetch_array($data);
                                $name = $row['firstname'];
                                $name2 = $row['lastname'];
                                ?>
                                <p class="profile-name"><?php echo $name . ' ' . $name2; ?><br><small class="text-muted"><span
                                            class="text-muted status-indicator online"></span> Online</small></p><br>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard">
                            <i class="menu-icon mdi mdi-television"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_pro">
                            <i class="menu-icon mdi mdi-account-circle" style="font-size: 20px"></i>
                            <span class="menu-title">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update_student_profile">
                            <i class="menu-icon fas fa-user-edit"></i>
                            <span class="menu-title">Update Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="change_password">
                            <i class="menu-icon mdi mdi-key" style="font-size: 20px;"></i>
                            <span class="menu-title">Change Password</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_noticeboard">
                            <i class="menu-icon fas fa-chalkboard-teacher"></i>
                            <span class="menu-title">NoticeBoard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_result">
                            <i class="menu-icon fas fa-copy"></i>
                            <span class="menu-title">Result</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_material">
                            <i class="menu-icon far fa-folder-open"></i>
                            <span class="menu-title">Helping Material</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basicmaterialquiz"
                            aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon far fa-question-circle"></i>
                            <span class="menu-title">Quiz</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basicmaterialquiz">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="check_quiz">Check Quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="manage_quiz_result">Quiz Results</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link submenu-logout-icon" data-toggle="modal" data-target="#exampleModal">
                            <i class="menu-icon mdi mdi-logout-variant"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
