@include('admin.include.header')

<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <style type="text/css" media="screen">
        body {
            text-align: center;
            font-family: sans-serif;
        }

        input {
            width: 100%;
            border: 1px solid lightgray;
            padding: 4px 15px;
            border-radius: 4px;
        }

        h1 {
            color: #fff;
            background-color: #212529;
            padding: 10px 0px;
            border-radius: 4px;
        }
    </style>

</head>

<body>
    <div class="adminpanel">
        <form method="post">
            <div class="container">
                <br><br>
                <h1>Enter Questions</h1>
                <br>
                @php
                    global $qno;
                    $new = 0;
                @endphp
                @for ($i = 1; $i <= $qno; $i++)
                    @php
                        $new++;
                    @endphp
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="col-sm-3" name="qnum{{ $i }}">Question {{ $i }}</td>
                                <td class="col-sm-9"><input type="text" name="qq1{{ $i }}" required></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3" value="1" name="op">Option a</td>
                                <td class="col-sm-9"><input type="text" name="q1{{ $new }}" required></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3" value="2" name="op">Option b</td>
                                <td class="col-sm-9"><input type="text" name="q2{{ $new }}" required></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3" value="3" name="op">Option c</td>
                                <td class="col-sm-9"><input type="text" name="q3{{ $new }}" required></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3" value="4" name="op">Option d</td>
                                <td class="col-sm-9"><input type="text" name="q4{{ $new }}" required></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3" value="5" name="{{ $i }}">Right Answer only
                                    alphabet</td>
                                <td class="col-sm-9"><input type="text" name="ans{{ $i }}" required
                                        maxlength="1"></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr style="background-color:#212529;height: 15px" class="progress-bar-striped">
                @endfor
                <br>
                <input name="submit22" type="submit"
                    class="btn btn-primary progress-bar-striped btn-rounded profile-btns col-sm-3" value="Add Quiz"
                    style="background-color:#212529 !important; border:1px solid #212529 !important;">
                <br><br><br>
            </div>
        </form>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
</body>

</html>

@if (isset($_POST['submit22']))
    @php
        $helo = 0;
        $query = mysqli_query($sql_con, 'SELECT max(id) AS id FROM quiz');
        while ($row = mysqli_fetch_assoc($query)) {
            $result = $row['id'];
            $id = $result + 1;
        }
        $qno = $_GET['numberofqus'];
        for ($i = 1; $i <= $qno; $i++) {
            $helo++;
            $qq1 = $_POST['qq1' . $helo];
            $qn1 = $_POST['q1' . $helo];
            $qn2 = $_POST['q2' . $helo];
            $qn3 = $_POST['q3' . $helo];
            $qno4 = $_POST['q4' . $helo];
            $right2 = $_POST['ans' . $i];
            $right = strtolower($right2);
            mysqli_query($sql_con, "INSERT INTO quiz (id,department,session,semester,subject,quizdate,quiztitle,questions,op1,op2,op3,op4,rightans,quiztime) VALUES ('$id','$dep','$sec','$sem','$sub','$date','$title','$qq1','$qn1','$qn2','$qn3','$qno4','$right','$timelimit')");
            echo '<script>
                alert('Quiz added successfully')
            </script>';
            echo '<script>
                window.location = 'add_quiz'
            </script>';
        }
    @endphp
@endif
