<?php
session_start();
require 'connection.php';
require 'functions.php';
$conn    = Connect();

$id = $_POST['user_id'];



$sqlr = "SELECT * FROM tb_cform WHERE id='" . $id . "'";
$success = $conn->query($sqlr);
$row = $success->fetch_assoc();

$br_beleske = get_string_between($row["beleske"],'[br_b]','[/br_b]');
$p_br_beleska = end($br_beleske);
$br_nove_beleske = $p_br_beleska + 1;


$beleske = '[br_b]' . $br_nove_beleske . '[/br_b]
            [txt_b]' . $_POST["beleske".$id] . '[/txt_b]
            [user_b]' . $_SESSION['user'] . '[/user_b]
            [datum_b]' . date("d-m-Y G:i:s") . '[/datum_b]
            [ocena_b]' . $_POST["ocena" . $id] . '[/ocena_b]' ;

$beleske_sve = $row['beleske'] . ' ' . $beleske;


$sql = "UPDATE tb_cform SET beleske='" . $beleske_sve . "' WHERE id='" . $id . "' ";
$update = $conn->query($sql);


if ($_SESSION["page"] == 'all'){
    header("location:adminpage.php");
}else{
    header("location:singleuserpage.php?id=".$id."");
}