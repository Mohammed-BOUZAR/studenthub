<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--META TAGS START -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Hub</title>
    
    <!-- LINKS START -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hover-min.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="icon" href="images/HeadLogo.png">

    <!-- add active class start-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
    <!-- add active class end -->
    
</head>
<body>
    
    <!-- NAVBAR SECTION START -->
      
<nav class="navbar navbar-expand-lg bgnav fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="images/Logo.png" alt="" class="img-fluid logo hvr-grow-shadow"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto text-center">
        <li class="nav-item">
            <a class="mymenu nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="mymenu nav-link" href="/about">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link mymenu" href="/teachers" id="navbarDropdownMenuLink" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
            Professors
            </a>
            <div class="dropdown-menu menubg">
            <a class=" nav-link te" href="/teacherlogin">Dashboard</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link mymenu" href="/students" id="navbarDropdownMenuLink" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
            Students
            </a>
            <div class="dropdown-menu menubg">
            <a class=" nav-link te" href="/studentlogin">Dashboard</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link mymenu" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sign Up
            </a>
            <div class="dropdown-menu menubg">
            <a class=" nav-link te" href="/teacher_signup">Teacher</a><br>
            <a class=" nav-link te" href="/student_signup">Student</a>
            </div>
        </li>
        </ul>
    </div>     
    </div>
</nav>