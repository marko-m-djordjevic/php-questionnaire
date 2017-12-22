<?php


require 'connection.php';
$conn    = Connect();
$zasto_trazite_posao   = $_POST['zasto_trazite_posao'];
$karijera_kod_nas = $_POST['karijera_kod_nas'];
$zbog_cega_kod_nas = $_POST['zbog_cega_kod_nas'];
$detaljno_radno_iskustvo = $_POST['detaljno_radno_iskustvo'];
$razlog_napustanja_radnog_mesta = $_POST['razlog_napustanja_radnog_mesta'];
$detaljna_iskustva_osiguranja = $_POST['detaljna_iskustva_osiguranja'];
$razlog_odlaska_od_poslodavca = $_POST['razlog_odlaska_od_poslodavca'];
$zasto_menjate_posao = $_POST['zasto_menjate_posao'];
$koliko_je_bitan_posao = $_POST['koliko_je_bitan_posao'];
$koliko_volite_raditi = $_POST['koliko_volite_raditi'];
$koliko_je_bitno_radno_vreme = $_POST['koliko_je_bitno_radno_vreme'];
$koju_smenu_radite = $_POST['koju_smenu_radite'];
$zivite_sami = $_POST['zivite_sami'];
$broj_clanova_domacinstva = $_POST['broj_clanova_domacinstva'];
$zivite_u_stanu_ili_kuci = $_POST['zivite_u_stanu_ili_kuci'];
$zaposlenost_ukucana = $_POST['zaposlenost_ukucana'];
$sredstva_u_kuci = $_POST['sredstva_u_kuci'];
$vas_prihod_u_kuci = $_POST['vas_prihod_u_kuci'];

$timer       = $_POST['timer'];
$userid     = $_POST['userid'];

$req = "SELECT * FROM tb_cform WHERE id='".$userid ."'";
$success_req = $conn->query($req);
$ada = $success_req->fetch_assoc();

$time_from_db = $ada['timer'];

if( empty($time_from_db) && !empty($userid) ){

    $query = "INSERT INTO tb_dpitanja (id,zasto_trazite_posao, karijera_kod_nas, zbog_cega_kod_nas,detaljno_radno_iskustvo,razlog_napustanja_radnog_mesta,
            detaljna_iskustva_osiguranja,razlog_odlaska_od_poslodavca,zasto_menjate_posao,koliko_je_bitan_posao,koliko_volite_raditi,
            koliko_je_bitno_radno_vreme,koju_smenu_radite,zivite_sami,broj_clanova_domacinstva,zivite_u_stanu_ili_kuci,zaposlenost_ukucana,
            sredstva_u_kuci,vas_prihod_u_kuci)
            VALUES ('" . $userid . "','" . $zasto_trazite_posao . "', '" . $karijera_kod_nas . "', '" . $zbog_cega_kod_nas . "','" . $detaljno_radno_iskustvo . "',
            '" . $razlog_napustanja_radnog_mesta . "','" . $detaljna_iskustva_osiguranja . "','" . $razlog_odlaska_od_poslodavca . "',
            '" . $zasto_menjate_posao . "','" . $koliko_je_bitan_posao . "','" . $koliko_volite_raditi . "','" . $koliko_je_bitno_radno_vreme . "',
            '" . $koju_smenu_radite . "','" . $zivite_sami . "','" . $broj_clanova_domacinstva . "','" . $zivite_u_stanu_ili_kuci . "',
            '" . $zaposlenost_ukucana . "','" . $sredstva_u_kuci . "','" . $vas_prihod_u_kuci . "')";
    
    
    $success = $conn->query($query);

    $query2 = "UPDATE tb_cform SET timer = '" . $timer . "' WHERE ID='".$userid ."'";
    $success2 = $conn->query($query2);
    

}


$conn->close();