@include('teachers.include.header');
<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputState3").on('change',function(){
         $("#inputStateSemester").prop("disabled",true);
          $("#inputState1").prop("disabled",false);
          $("#inputStateSubject").prop("disabled",true);
           var val2 = $("#inputState3").val();
            $.ajax({    
                url: "../stdsec",
                method: "post",
                data: 'myvalue='+val2
            }).done(function(sec){
                 $('#inputState1').html(sec);
            }) 
       })
    });
</script>
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputState1").on('change',function(){
           $("#inputStateSemester").prop("disabled",false);
           var val2 = $("#inputState1").val();
            $.ajax({  
                url: "sec",
                method: "post",
                data: 'value='+val2
            }).done(function(sec){
                 $('#inputStateSemester').html(sec);
            }) 
       })
    });
</script>
<script type="text/javascript">
       $(document).ready(function(){
        $("#inputStateSemester").on('change',function(){
           $("#inputStateSubject").prop("disabled",false);
           var val2 = $("#inputStateSemester").val();
            $.ajax({  
                url: "sec3",
                method: "post",
                data: 'value='+val2
            }).done(function(sec){
                 $('#inputStateSubject').html(sec);
            }) 
       })
    });
</script>
<!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-muted"><i class="far fa-question-circle bred-icons"></i> <span class="bred-line">/</span> Add Quiz</p>
              </span>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <div class="panel panel2">
                <form class="update-pro-form" method="post" action="/teachers/add_questions">
                  @csrf
                  <label>Select Department</label>
                      <select id="inputState3" name="dep" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                        <?php 
                        $data = mysqli_query($sql_con,"Select *from departments where deleted_at is null");
                        if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                        while ($row = mysqli_fetch_array($data)){
                         ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['depname'] ?></option>
                        <?php } ?>
                      </select><br>
                      <label>Select Session</label>
                      <select id="inputState1" disabled name="session" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                        <?php 
                          $data = mysqli_query($sql_con,"Select *from sessions where deleted_at is null");
                          if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                          while ($row = mysqli_fetch_array($data)){
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['session'] ?></option>
                        <?php } ?>
                      </select><br>
                      <label>Select Semester</label>
                      <select disabled id="inputStateSemester" name="semester" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                        <?php 
                          $data = mysqli_query($sql_con,"Select *from semesters where deleted_at is null");
                          if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                          while ($row = mysqli_fetch_array($data)){
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['semester'] ?></option>
                        <?php } ?>
                      </select><br>
                       <label>Select Subject</label>
                      <select disabled id="inputStateSubject" name="subject" class="col-sm-12 form-control" required="true">
                        <option value="">Choose...</option>
                        <?php 
                          $data = mysqli_query($sql_con,"Select *from subjects where deleted_at is null");
                          if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                          while ($row = mysqli_fetch_array($data)){
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sname'] ?></option>
                        <?php } ?>
                      </select><br>
                      
                      <label>Quiz Title</label>
                      <input type="text" name="quiztitle" class="col-sm-12 form-control" required placeholder="Enter quiz title"><br>

                      <label>Number of questions</label>
                      <input min="1" type="number" name="numberofqus" class="col-sm-12 form-control" required placeholder="Enter Number of question"><br>

                      <label>Time Limit</label>
                      <input min="1" type="number" name="timelimit" class="col-sm-12 form-control" required placeholder="Enter time limit"><br>

                      <label>Select Date</label>
                      <input type="date" name="date" class="col-sm-12 form-control" required><br>
                      
                <center>
                    <input name="submit" type="submit" class="btn btn-outline-primary btn-rounded profile-btns" value="Add Quiz">
                  <br><br>
                </center>   
            </form>
        </div>
      </div>
    </div>
        <!-- content-wrapper ends -->

        @include('teachers.include.footer');

 </body>
 </html>
<!-- <?php 
// if (isset($_POST['submit'])) {
//   $subject = $_POST['subject'];
//   $dep = $_POST['dep'];
//   $sess = $_POST['session'];
//   $semester = $_POST['semester'];
//   mysqli_query($sql_con,"INSERT INTO subjects(sname,department,session,semester) VALUES ('$subject','$dep','$sess','$semester')");
//   echo "<script>alert('Subject added successfully')</script>";
//   }
