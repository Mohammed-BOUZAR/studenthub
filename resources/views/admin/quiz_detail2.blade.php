{{-- @include('admin.include.session'); --}}

<html>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<style type="text/css">
    body {
        text-align: center;
        margin-top: 30px;
        margin-left: 15px;
        margin-right: 15px;
        font-family: sans-serif;
    }

    h1 {
        padding-bottom: 15px;
        background-color: #212529;
        color: #fff;
        border-radius: 4px;
        padding-top: 15px;
    }
</style>
<?php include 'include/dbcon.php'; ?>
<h1>Quiz Details</h1>
<div class="table-responsive">
    <table class="table table-bordered">

        <thead class="thead-dark">
            <tr>
                <th>Questions</th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Option 4</th>
                <th>Right Ans</th>
            </tr>
        </thead>
        <tbody>
            <?php
 		if (isset($_GET['value'])) {
			$id = $_GET['value'];
			$data = mysqli_query($sql_con,"Select *from quizresult where id ='$id'");
			$myrow2 = mysqli_fetch_array($data); 
			$quizid = $myrow2['quizid'];
 		$quiquery = mysqli_query($sql_con,"select * from quiz where id = '$quizid'");
 		while ($row = mysqli_fetch_array($quiquery)){
			 $myrow3 = mysqli_fetch_array($data);
			 $userans = $myrow3['ans'];
			?>
            <tr>
                <td><?php echo $row['questions']; ?></td>
                <td><?php echo $row['op1']; ?></td>
                <td><?php echo $row['op2']; ?></td>
                <td><?php echo $row['op3']; ?></td>
                <td><?php echo $row['op4']; ?></td>
                <td><?php echo $row['rightans']; ?></td>
            </tr>
            <?php } }?>
        </tbody>
    </table>
</div>
<h1>Student Answers</h1>
<div class="table-responsive">
    <table class="table table-bordered">

        <thead class="thead-dark">
            <tr>
                <?php
 			$varmy = 1;
 		if (isset($_GET['value'])) {
			$id = $_GET['value'];
			$data = mysqli_query($sql_con,"Select *from quizresult where id ='$id'");
 			while ($row = mysqli_fetch_array($data)){
			 $userans = $row['ans'];
			?>
                <td style="font-weight: bold">Question<?php echo $varmy; ?></td>

                <?php $varmy++; } }?>
            </tr>
        </thead>
        <tbody>

            <tr>
                <?php
 		if (isset($_GET['value'])) {
			$id = $_GET['value'];
			$data = mysqli_query($sql_con,"Select *from quizresult where id ='$id'");
 			while ($row = mysqli_fetch_array($data)){
			 $userans = $row['ans'];
			?>
                <td><?php echo $userans; ?></td>
                <?php } }?>
            </tr>

        </tbody>
    </table>
</div>
<br>
<a href="" data-toggle="modal" data-target="#quizdelete" class="btn btn-outline-danger btn-rounded">Delete
    Result</a>
<br><br>

<!-- MODEL -->
<div class="modal fade" id="quizdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete quiz result?
            </div>
            <div class="modal-footer">
                <a href="delete_quiz2.php?value=<?php echo $id; ?>" class="btn btn-outline-primary">YES</a>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">NO</button>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
