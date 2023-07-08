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
                    <p class="text-muted"><i class="far fa-calendar-alt bred-icons"></i> <span class="bred-line">/</span>
                        Add Session</p>
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="panel panel2">
                    <form class="update-pro-form" method="post" action="/admin/add_session">
                        @csrf
                        <label>Select Department</label>
                        <select name="dep" class="col-sm-12 form-control" required="true">
                            <option value="">Choose...</option>
                            <?php
                         $data = mysqli_query($sql_con,"Select *from departments");
                          while ($row = mysqli_fetch_array($data)){
                           ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['depname']; ?></option>
                            <?php } ?>
                        </select><br>
                        <label>Add new session</label>
                        <input name="session" id="sec" type="text"class="col-sm-12 form-control"
                            placeholder="Enter Session" required="true"></input><br>
                        <center>
                            <input name="submit" type="submit"
                                class="btn btn-outline-primary btn-rounded profile-btns" value="Add Session">
                            <br><br>
                        </center>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('admin.include.footer');

        <script type="text/javascript">
            $('#sec').keyup(function() {
                var v = $(this).val().replace(/\D/g, ''); // Remove non-numerics
                v = v.replace(/(\d{4})(?=\d)/g, '$1-'); // Add dashes every 4th digit
                $(this).val(v)
            });
        </script>
        </body>

        </html>
        <?php
        if (isset($_POST['submit'])) {
            echo "<script>alert('Session added successfully')</script>";
        }
        ?>
