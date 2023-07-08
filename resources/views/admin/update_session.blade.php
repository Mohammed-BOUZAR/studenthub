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
                <p class="text-muted"><i class="far fa-calendar-alt bred-icons"></i> <span class="bred-line">/</span> update Session</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <div class="panel panel2">
                <form class="update-pro-form" method="post" action="/admin/update_session/{{$id}}">
                  @csrf
                      <label>Update session</label>
                      <?php 
                      // $id = $_GET['value'];
                      $data = mysqli_query($sql_con,"SELECT *from sessions where id = '$id' and deleted_at is null");
                      $row = mysqli_fetch_array($data);
                       ?>
                      <input value="<?php echo $row['session'] ?>" name="session" id="sec" type="text"class="col-sm-12 form-control" placeholder="Enter Session"></input><br>
                <center>
                    <input name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns" value="Update Session">
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
    if (isset($_GET['value'])) {
      $id = $_GET['value'];
      $sec = $_POST['session'];
      mysqli_query($sql_con,"UPDATE session set session = '$sec' where id ='$id'");
      echo "<script>alert('Session updated successfully')</script>";
      echo "<script>window.location = 'manage_session'</script>"; 
    }
    else{
      echo "<script>alert('Go back and try again something wrong')</script>";
      echo "<script>window.location = 'manage_session'</script>";
    }
  }
  ?>