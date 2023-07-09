@include('students.include.header')
<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>
<?php 
  // if (isset($_POST['submit'])) {
    $dep = $dep;
    $sec = $session;
    $sem = $semester;
    $sub = $subject;
    date_default_timezone_set("Asia/Karachi");
    $mydate = date("Y-m-d");
  // }
  // else{
  //   echo "<script>window.location='check_quiz.php'</script>";
  // }
 ?>

<!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-muted"><i class="far fa-question-circle bred-icons"></i> <span class="bred-line">/</span> Available Quiz </p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <h5 class="text-danger" style="padding-left: 15px;">Note:</h5>
              <p class="text-danger" style="padding-left: 15px;">Quiz only available for 24 hours</p>
              <div class="panel panel2">
                  <div class="table-responsive">
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm">ID
                          </th>
                          <th class="th-sm">Subject
                          </th>
                          <th class="th-sm">Semester
                          </th>
                          <th class="th-sm">Session
                          </th>
                          <th class="th-sm">Department
                          </th>
                          <th class="th-sm">Quiz Date
                          </th>
                          <th class="th-sm">Quiz Title
                          </th>
                          <th class="th-sm">Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // TEST CODE
                        $sid = session('sid');
                        $myquery = mysqli_query($sql_con,"Select dep from students where id = '$sid' and deleted_at is null");
                        $srow = mysqli_fetch_array($myquery);
                        $namedep = $srow['dep'];


                        // TEST CODE
                        $query2 = mysqli_query($sql_con,"SELECT * FROM quizzes where department = '$namedep' AND session = '$sec' AND semester = '$sem' AND subject = '$sub' AND quizdate = '$mydate' and deleted_at is null");
                        // print_r($query2);
                        // echo "'$namedep' '$sec'  '$sem'  '$sub' '$mydate'";
                        $row = mysqli_num_rows($query2);
                        if($row <= 0){
                            echo "<script>alert('Quiz not available or invalid department')</script>";
                            // echo "<script>window.location='check_quiz.php'</script>";
                            exit();
                           }
                        if($row > 0){
                          
                         while ($subrow = mysqli_fetch_array($query2)) {
                          
                           $semid = $subrow['semester'];
                           $sessid = $subrow['session'];
                           $depid = $subrow['department'];
                           $subid = $subrow['subject'];

                           $datasub = mysqli_query($sql_con,"select *from subjects where id = '$subid' and deleted_at is null");
                           $subfetch = mysqli_fetch_array($datasub);
                           $subname = $subfetch['sname'];

                           $data = mysqli_query($sql_con,"select *from semesters where id = '$semid' and deleted_at is null");
                           $semfetch = mysqli_fetch_array($data);
                           $semname = $semfetch['semester'];

                           $data2 = mysqli_query($sql_con,"select *from sessions where id = '$sessid' and deleted_at is null");
                           $row2 = mysqli_fetch_array($data2);
                           $sessname = $row2['session'];

                           $data3 = mysqli_query($sql_con,"select *from departments where id = '$depid' and deleted_at is null");
                           $row3 = mysqli_fetch_array($data3);
                           $depname = $row3['depname'];
                         ?>
                        <tr>
                          <td><?php echo $subrow['id']; ?></td>
                          <td><?php echo $subname; ?></td>
                          <td><?php echo $semname; ?></td>
                          <td><?php echo $sessname; ?></td>
                          <td><?php echo $depname; ?></td>
                          <td><?php echo $subrow['quizdate']; ?></td>
                          <td><?php echo $subrow['quiztitle']; ?></td>
                          <td>
                            <a href="/quiz_start/<?php echo $subrow['id']; ?>" class="btn btn-outline-primary btn-rounded" >Start Quiz</a>
                          </td>
                        </tr>
                      <?php } } ?>
                      </tbody>
                    </table>
          </div>
        </div>
      </div>
    </div>
        <!-- content-wrapper ends -->

        @include('students.include.footer')

   <script type="text/javascript">
     $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

   </script>
 </body>
 </html>