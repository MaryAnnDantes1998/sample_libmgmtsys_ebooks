<?php 
session_start();
include "../include/dbcon.php";
    $username = $_POST['username'];
    $email= $_POST['email'];
    $code=rand(100,999);
    

    $admin = mysqli_query($con,"select * from admin where username='$username'");
    $row = mysqli_num_rows($admin);

    $user = mysqli_query($con,"select * from user where username='$username'");
    $row1 = mysqli_num_rows($user);

if ($row == 1) {
        
        $query2 = mysqli_query($con,"update admin set activation_code='$code' where username='$username' ") or die(mysqli_error($con)); 
    }
elseif ($row1 == 1) {
        $query3 = mysqli_query($con,"update user set activation_code='$code' where username='$username' ") or die(mysqli_error($con));
    }
   
require('php-mailer-master/PHPMailerAutoload.php');


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'fajut.vhan@gmail.com';                 // SMTP username
    $mail->Password = 'zyxwvutsrqpo';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('fajut.vhan@gmail.com', 'LMS');
    $mail->addAddress($email);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Password';
    $mail->Body    = '<a href="http://localhost/sample/admin/reset_pass.php?username='.$username.'&activation_code='.$code.'"><strong>Click Here</strong></a> to reset password';
   

    $mail->send();
    echo "<script>alert('Message has been sent!'); window.location='index.php'</script>";
} 
    catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


?>