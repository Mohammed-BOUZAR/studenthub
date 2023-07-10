
@include('include.header');
<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>

<!-- TEACHER LOGIN FORM SECTION START -->

<section class="LoginForm-bg-image teacher-login-bg navbar-bottom-space">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-col">
                    <div class="outerdiv">
                        <h1 class="Login-text">Teacher Login Form</h1>
                        <div class="InnerDiv">
                            <form method="post" action="/teachers/login">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email" required="true"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password" required="true" name="password">
                                </div>
                                <center>
                                    <button name="submit2" type="submit"
                                        class="btn btn-primary btn-login-form">Login</button>
                                    <p data-toggle="modal" data-target="#forgotpass" class="forgot-para">Forgot
                                        Password?</p>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TEACHER LOGIN FORM SECTION END -->

<!-- FORGOT PASSWORD DIALOG START -->

<div class="modal fade" id="forgotpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title forgot-heading" id="exampleModalLabel">RESET PASSWORD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p class="forgot-heading2">Forgot your password?</p>
                <p>Enter your email address and we will send your password on that Email.</p>
                <form action="teacher_email.php" method="post">
                    <div class="form-group col-md-10 input-forgot-div">
                        <input name="email" type=email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" required="true">
                    </div>

                    <center>
                        <button name="submit" type="submit" class="btn btn-primary btn-login-form">Send Email</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FORGOT PASSWORD DIALOG END -->


@include('include.footer');

<script type="text/javascript">
    history.pushState(null, "", location.href.split("?")[0]);
</script>

</body>

</html>
<?php
if (isset($_GET['msg'])) {
    $var = $_GET['msg'];
    echo "<script>alert('$var')</script>";
}

if (isset($_POST['submit2'])) {
    $value1 = $_POST['email'];
    $value2 = $_POST['password'];
    $data = mysqli_query($sql_con, "select *from teachers where emailfld = '$value1' AND password='$value2'");
    $datarow = mysqli_num_rows($data);
    if ($datarow > 0) {
        $row = mysqli_fetch_array($data);
        $value3 = $row['id'];
        $status = $row['status'];
        if ($status == 0) {
            echo "<script>alert('please wait while your account is authenticated')</script>";
            exit();
        }
        $_SESSION['tid'] = $value3;
        echo "<script>window.location='teachers/dashboard.php'</script>";
    } else {
        echo "<script>alert('Invalid information please try again')</script>";
    }
}
?>
