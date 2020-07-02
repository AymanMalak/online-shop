<?php
use PHPMailer\PHPMailer\PHPMailer;


// if form is submitted
if ($_POST['submit']) {
    
    // read data from form
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // echo $fname . "   ". $email . "    ". $message;
    require_once '../PHPMailer/PHPMailer.php';
    require_once '../PHPMailer/SMTP.php';
    require_once '../PHPMailer/Exception.php';
    
    $email = new PHPMailer();

    // SMTP Setting
    $email->isSMTP();
    $email->Host ="smtp.gmail.com";
    $email->SMTPAuth=  true;
    $email->Username = "aymanmalak312@gmail.com";
    $email->Password = 'ahmed0184969584';
    $email->Port = 465;
    $email->SMTPSecure="ssl";

    // Email Setting 
    $email->isHTML(true);
    $email->setFrom("aymanmalak312@gmail.com");
    $email->addAddress("aymanabdelmalak11@gmail.com");
    $email->Subject = $message;
    $email->Body = "heeeeeeeeeeeeeeeeeeeeee";

    if($email->send()){
        echo "<div class='alert alert-success'> Email has been sent </div>>";
    }else{
        echo "<div class='alert alert-danger'> Error ocurres  </div> <br>".$email->ErrorInfo;
    }






    header('location:../test.php');
} else {
    header('location: ../test.php');
}
