<?php

require 'connection.php';
$conn    = Connect();

$userid = $_POST['id'];

$req = "SELECT * FROM tb_cform WHERE id='".$userid ."'";
$success_req = $conn->query($req);
$ada = $success_req->fetch_assoc();

$db_dodatna_forma = $ada['dodatna_forma'];

$user_mail = $ada['email'];

if( $db_dodatna_forma == 'Dodatna forma nije poslata.' ){
    $query = "UPDATE tb_cform SET dodatna_forma='Dodatna forma poslata.' WHERE id='".$userid ."'";
    $success = $conn->query($query);
    


    $to = $user_mail;
    $subject = "KONKURS";
    $txt = "TEXT PORUKE";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From:<no-replay@example.com>' . "\r\n";
    
    mail($to,$subject,$txt,$headers);

}

$conn->close();