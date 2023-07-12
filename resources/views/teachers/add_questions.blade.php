<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="/teacher/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/teacher/css/all.min.css">

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
        <form method="post" action="/teachers/add_quiz">
            @csrf
            <input type="hidden" name="number" id="" value="{{ $numberofqus }}">
            <input type="hidden" name="dep" id="" value="{{ $dep }}">
            <input type="hidden" name="sec" id="" value="{{ $sec }}">
            <input type="hidden" name="sem" id="" value="{{ $sem }}">
            <input type="hidden" name="sub" id="" value="{{ $sub }}">
            <input type="hidden" name="date" id="" value="{{ $date }}">
            <input type="hidden" name="title" id="" value="{{ $title }}">
            <input type="hidden" name="timelimit" id="" value="{{ $timelimit }}">
            <div class="container">
                <br><br>
                <h1>Enter Questions</h1>
                <br>
                @php
                    $qno = $numberofqus;
                    $new = 0;
                @endphp
                @for ($i = 1; $i <= $numberofqus; $i++)
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
    <script src="/teacher/js/jquery-3.3.1.min.js"></script>
    <script src="/teacher/js/bootstrap.min.js"></script>
    <script src="/teacher/js/popper.min.js"></script>
</body>

</html>
