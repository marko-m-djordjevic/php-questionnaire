<?php
session_start();
require 'connection.php';
$conn    = Connect();
$user = ($_POST['username']);
$pass = md5(($_POST['password']));

$query = "SELECT * FROM tb_admin WHERE name='" . $user . "'";
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);
}

$ada = $success->fetch_assoc();
$db_user = $ada["name"];
$db_pass = $ada["pass"];


$_SESSION["login"]=0;

if( $db_user !== $user || $db_pass !== $pass ){
    echo "Pogresni podaci. Vratite se na formu <a  href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/login.php' >ovde</a>";
}else{
    $_SESSION["user"]=$user;
    $_SESSION["login"]=1;
    header("Location: http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/adminpage.php");
    die();
}

session_destroy();