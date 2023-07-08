<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>
<?php
if (isset($_POST['submit'])) {
    $inpemail = $_POST['email'];
    $data = mysqli_query($sql_con, "select * from teachers where emailfld = '$inpemail'");
    $row = mysqli_fetch_array($data);
    $email = $row['emailfld'];
    if ($email != $inpemail) {
        echo "<script>alert('Email does not exist')</script>";
        echo "<script>window.location='teacherlogin.php'</script>";
        return false;
    }
    require 'PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer();

    //Enable SMTP debugging.
    $mail->SMTPDebug = 1;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ],
    ];
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = '';
    $mail->Password = '';
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = 'false';
    $mail->Port = 587;
    //Set TCP port to connect to

    $mail->From = '';
    $mail->FromName = 'STUDENTHUB';

    $mail->addAddress($row['emailfld']);

    $mail->isHTML(true);

    $mail->Subject = 'This mail is from Student Hub to show your password';
    $mail->Body = '<i>This is your password:</i>' . $row['password'];
    $mail->AltBody = 'This is the plain text version of the email content';
    if (!$mail->send()) {
        // echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $msg = 'Mail has been sent successfully';
        header('location: teacherlogin.php?msg=' . $msg);
    }
}

?>
