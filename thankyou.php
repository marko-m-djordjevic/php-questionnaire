<!DOCTYPE html>
<html>
    <head>
        <title> Simple PHP contact form with MySQL and Form Validation </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="thankyou_page">
<?php

require 'connection.php';
$conn    = Connect();
$pozicija = ( empty($_POST['pozicija']) )? '' : $conn->real_escape_string($_POST['pozicija']);
$ime    = $conn->real_escape_string($_POST['ime']);
$prezime   = $conn->real_escape_string($_POST['prezime']);
$email    = $conn->real_escape_string($_POST['email']);
$web_stranica = $conn->real_escape_string($_POST['web_stranica']);
$mesto_stanovanja = $conn->real_escape_string($_POST['mesto_stanovanja']);
$datum = $conn->real_escape_string($_POST['datum']);
$adresa = $conn->real_escape_string($_POST['adresa']);
$postanski_br = $conn->real_escape_string($_POST['postanski_br']);
$br_telefona = $conn->real_escape_string($_POST['br_telefona']);
$br_mobilnog = $conn->real_escape_string($_POST['br_mobilnog']);
$sprema = ( empty($_POST['sprema']) )? '' : $conn->real_escape_string($_POST['sprema']);
$zanimanje = $conn->real_escape_string($_POST['zanimanje']);
$zadnja_obrazovna_institucija = $conn->real_escape_string($_POST['zadnja_obrazovna_institucija']);
$dodatne_edukacije = $conn->real_escape_string($_POST['dodatne_edukacije']);
$trenutni_status = $conn->real_escape_string($_POST['trenutni_status']);
$iskustvo_u_osiguranju = ( empty($_POST['iskustvo_u_osiguranju']) )? '' : $conn->real_escape_string($_POST['iskustvo_u_osiguranju']);
$iskustvo_u_osiguranju_koliko = $conn->real_escape_string($_POST['iskustvo_u_osiguranju_koliko']);
$iskustvo_u_osiguranju_gdje = $conn->real_escape_string($_POST['iskustvo_u_osiguranju_gdje']);
$iskustvo_u_prodaji = ( empty($_POST['iskustvo_u_prodaji']) ) ? '' : $conn->real_escape_string($_POST['iskustvo_u_prodaji']);
$iskustvo_u_prodaji_koliko = $conn->real_escape_string($_POST['iskustvo_u_prodaji_koliko']);
$iskustvo_u_prodaji_cega = $conn->real_escape_string($_POST['iskustvo_u_prodaji_cega']);
$ukupno_radno_iskustvo_g = $conn->real_escape_string($_POST['ukupno_radno_iskustvo_g']);
$ukupno_radno_iskustvo_m = $conn->real_escape_string($_POST['ukupno_radno_iskustvo_m']);
$znanje_stranog_jezika =  ( empty($_POST['znanje_stranog_jezika']) ) ? '' : $conn->real_escape_string($_POST['znanje_stranog_jezika']);
$strani_jezik = $conn->real_escape_string($_POST['strani_jezik']);
$rad_na_kompjuteru = ( empty($_POST['rad_na_kompjuteru']) ) ? '' : $conn->real_escape_string($_POST['rad_na_kompjuteru']);
$vozacka_dozvola = ( empty($_POST['vozacka_dozvola']) ) ? '' : $conn->real_escape_string($_POST['vozacka_dozvola']);
$ocekivanja = ( empty($_POST['ocekivanja']) ) ? '' : $conn->real_escape_string($_POST['ocekivanja']);
$ocekivanja_nesto_drugo = $conn->real_escape_string($_POST['ocekivanja_nesto_drugo']);
$slobodno_vreme = $conn->real_escape_string($_POST['slobodno_vreme']);
$osobine_hobi = $conn->real_escape_string($_POST['osobine_hobi']);
$skolovanje_esicher = ( empty($_POST['skolovanje_esicher']) ) ? '' : $conn->real_escape_string($_POST['skolovanje_esicher']);
$iskustvoTvrtka1 = $conn->real_escape_string($_POST['iskustvoTvrtka1']);
$iskustvoMjesto1 = $conn->real_escape_string($_POST['iskustvoMjesto1']);
$iskustvoRazdoblje1 = $conn->real_escape_string($_POST['iskustvoRazdoblje1']);
$iskustvoTvrtka2 = $conn->real_escape_string($_POST['iskustvoTvrtka2']);
$iskustvoMjesto2 = $conn->real_escape_string($_POST['iskustvoMjesto2']);
$iskustvoRazdoblje2 = $conn->real_escape_string($_POST['iskustvoRazdoblje2']);
$iskustvoTvrtka3 = $conn->real_escape_string($_POST['iskustvoTvrtka3']);
$iskustvoMjesto3 = $conn->real_escape_string($_POST['iskustvoMjesto3']);
$iskustvoRazdoblje3 = $conn->real_escape_string($_POST['iskustvoRazdoblje3']);
$iskustvoTvrtka4 = $conn->real_escape_string($_POST['iskustvoTvrtka4']);
$iskustvoMjesto4 = $conn->real_escape_string($_POST['iskustvoMjesto4']);
$iskustvoRazdoblje4 = $conn->real_escape_string($_POST['iskustvoRazdoblje4']);
$iskustvoTvrtka5 = $conn->real_escape_string($_POST['iskustvoTvrtka5']);
$iskustvoMjesto5 = $conn->real_escape_string($_POST['iskustvoMjesto5']);
$iskustvoRazdoblje5 = $conn->real_escape_string($_POST['iskustvoRazdoblje5']);


$image_base_name = basename($_FILES["profilna_slika"]["name"]);
$cv_base_name = basename($_FILES["cv"]["name"]);
$cv_file_type = pathinfo($cv_base_name,PATHINFO_EXTENSION);

$uploadOk = 1;
$imageFileType = pathinfo($image_base_name,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilna_slika"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}
// Allow certain file formats
if( !empty($cv_base_name) ){
    if($cv_file_type != "pdf" && $cv_file_type != "doc" && $cv_file_type != "docx" && $cv_file_type != "txt" 
        && $cv_file_type != "jpg" && $cv_file_type != "jpeg" ) {
        echo "Samo PDF, DOC, DOCX, TXT, JPG, JPEG, fajlovi su dozvoljeni.<br>";
        $uploadOk = 0;
    }
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Samo JPG, JPEG, PNG & GIF fajlovi su dozvoljeni.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Žao nam je, vaša prijava nije prosleđena.<br>";
// if everything is ok, try to upload file
} else {

    
    $query   = "INSERT into tb_cform (ime,prezime,pozicija,email,web_stranica,mesto_stanovanja,datum,adresa,postanski_br,br_telefona,br_mobilnog,sprema,
                zanimanje,zadnja_obrazovna_institucija,dodatne_edukacije,trenutni_status,iskustvo_u_osiguranju,iskustvo_u_osiguranju_koliko,
                iskustvo_u_osiguranju_gdje,iskustvo_u_prodaji,iskustvo_u_prodaji_koliko,iskustvo_u_prodaji_cega,ukupno_radno_iskustvo_g,ukupno_radno_iskustvo_m,
                znanje_stranog_jezika,strani_jezik,rad_na_kompjuteru,vozacka_dozvola,ocekivanja,ocekivanja_nesto_drugo,slobodno_vreme,osobine_hobi,
                skolovanje_esicher,iskustvoTvrtka1,iskustvoMjesto1,iskustvoRazdoblje1,iskustvoTvrtka2,iskustvoMjesto2,iskustvoRazdoblje2,iskustvoTvrtka3,
                iskustvoMjesto3,iskustvoRazdoblje3,iskustvoTvrtka4,iskustvoMjesto4,iskustvoRazdoblje4,iskustvoTvrtka5,iskustvoMjesto5,iskustvoRazdoblje5,dodatna_forma)
                VALUES('" . $ime . "','" . $prezime . "','" . $pozicija . "','" . $email . "','" . $web_stranica . "','" . $mesto_stanovanja . "','" . $datum . "',
                '" . $adresa . "','" . $postanski_br . "','" . $br_telefona . "','" . $br_mobilnog . "','" . $sprema . "','" . $zanimanje . "',
                '" . $zadnja_obrazovna_institucija . "','" . $dodatne_edukacije . "','" . $trenutni_status . "','" . $iskustvo_u_osiguranju . "',
                '" . $iskustvo_u_osiguranju_koliko . "','" . $iskustvo_u_osiguranju_gdje . "','" . $iskustvo_u_prodaji . "','" . $iskustvo_u_prodaji_koliko . "',
                '" . $iskustvo_u_prodaji_cega . "','" . $ukupno_radno_iskustvo_g . "','" . $ukupno_radno_iskustvo_m . "','" . $znanje_stranog_jezika . "',
                '" . $strani_jezik . "','" . $rad_na_kompjuteru . "','" . $vozacka_dozvola . "','" . $ocekivanja . "','" . $ocekivanja_nesto_drugo . "',
                '" . $slobodno_vreme . "','" . $osobine_hobi . "','" . $skolovanje_esicher . "','" . $iskustvoTvrtka1 . "','".$iskustvoMjesto1."',
                '" . $iskustvoRazdoblje1 . "','" . $iskustvoTvrtka2 . "','" . $iskustvoMjesto2 . "','" . $iskustvoRazdoblje2 . "','" . $iskustvoTvrtka3 . "',
                '" . $iskustvoMjesto3 . "','" . $iskustvoRazdoblje3 . "','" . $iskustvoTvrtka4 . "','" . $iskustvoMjesto4 . "','" . $iskustvoRazdoblje4 . "',
                '" . $iskustvoTvrtka5 . "','" . $iskustvoMjesto5 . "','" . $iskustvoRazdoblje5 . "','Dodatna forma nije poslata.')";
    $success = $conn->query($query);
    $id      = $conn->insert_id;
    if (!$success) {
        echo $mesto_stanovanja;
        die("Podaci nisu uneti: ".$conn->error);

    }

    //Promenljive sa latinicnim i cirilicnim slovima za zamenu
    $lat_cir_slova = array("Č","Ć","Ž","Š","Đ","č","ć","ž","š","đ",
                    "А","Б","В","Г","Д","Ђ","Е","Ж","З","И","Ј","К","Л","Љ","М","Н","Њ","О","П","Р","С","Т","Ћ","У","Ф","Х","Ц","Ч","Џ","Ш",
                    "а","б","в","г","д","ђ","е","ж","з","и","ј","к","л","љ","м","н","њ","о","п","р","с","т","ћ","у","ф","х","ц","ч","џ","ш");
    $alf_slova     = array("C","C","Z","S","Dj","c","c","z","s","dj",
                    "A","B","V","G","D","Dj","E","Z","Z","I","J","K","L","Lj","M","N","Nj","O","P","R","S","T","C","U","F","H","C","C","Dz","S",
                    "a","b","v","g","d","dj","e","z","z","i","j","k","l","lj","m","n","nj","o","p","r","s","t","c","u","f","h","c","c","dz","s");
    $n = count($lat_cir_slova);
    //menja latinicna i slova cirilicna slova u alfabet
    for ( $i=0; $i<$n; $i++ ){
        $image_base_name = str_replace( $lat_cir_slova[$i], $alf_slova[$i], $image_base_name );
    }
    //menja latinicna i slova cirilicna slova u alfabet
    for ( $i=0; $i<$n; $i++ ){
        $cv_base_name = str_replace( $lat_cir_slova[$i], $alf_slova[$i], $cv_base_name );
    }


    $target_dir = "uploads/";
    $image_name = "[id=" . $id . "]" . $image_base_name;
    $cv_name = "[id=" . $id . "]" . $cv_base_name;
    $target_file_img = $target_dir . $image_name;
    $target_file_cv = $target_dir . $cv_name;


    $poruka = " Poruka koja se prikaže prilikom poslate forme.";
    echo $poruka;

    if (move_uploaded_file($_FILES["profilna_slika"]["tmp_name"], $target_file_img)) {
        $sql = "UPDATE tb_cform SET image_name='" . $image_name . "' WHERE id='" . $id . "' ";
        $update = $conn->query($sql);
        if (!$update) {
            die("Podaci nisu uneti: ".$conn->error);
    
        }
    } else {
        echo "Žao nam je, došlo je do greške tokom prijave.<br>";
    }

    if( !empty($cv_base_name) ){
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file_cv)) {
            $sql = "UPDATE tb_cform SET cv_name='" . $cv_name . "' WHERE id='" . $id . "' ";
            $update = $conn->query($sql);
            if (!$update) {
                die("Podaci nisu uneti: ".$conn->error);
        
            }
        } else {
            echo "Žao nam je, došlo je do greške tokom prijave.<br>";
        }
    }
}

$conn->close();
?>
</body>
</html>