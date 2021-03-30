<?php
  use PHPMailer\PHPMailer\PHPMailer;
  if(isset($_POST['name']) && isset($_POST['email'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $body=$_POST['body'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail=new PHPMailer();

    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth=true;
    $mail->Username="testingpractice416@gmail.com";			//your emailid
    $mail->Password='T@123456';				//your password
    $mail->Port=465;
    $mail->SMTPSecure="ssl";

    $mail->isHTML(true);
    $mail->setFrom($email,$name);
    $mail->addAddress("testingpractice416@gmail.com");			//youremailid
    $mail->Subject=("$email ($subject)");
    $mail->Body=$body;
    if($mail->send()){
      $status="success";
      $response="Email has been sent";
    }
    else{
      $status="failed";
      $response="Something is wrong: ".$mail->ErrorInfo;
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
  }
 ?>
