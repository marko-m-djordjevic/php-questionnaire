<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <script src="posalji_dodatnu_formu.js"></script>
    </head>
    <body class="singleuserpage">
<?php
session_start();
require 'functions.php';

$_SESSION["page"] = 'single';

$id = $_GET["id"];
if (  $_SESSION["login"] == 1 ){
    require 'connection.php';
    $conn    = Connect();

    $query = "SELECT * FROM tb_cform WHERE id='" . $id . "'";
    $success = $conn->query($query);
    $row = $success->fetch_assoc();

    $query2 = "SELECT * FROM tb_dpitanja WHERE id='" . $id . "'";
    $success2 = $conn->query($query2);
    $dp_row = $success2->fetch_assoc();

    $txt_beleske = get_string_between($row["beleske"],'[txt_b]','[/txt_b]');
    $p_txt_beleska = end($txt_beleske);
    $user_beleska = get_string_between($row["beleske"], '[user_b]','[/user_b]');
    $p_user_beleska = end($user_beleska);
    $time_beleska = get_string_between($row["beleske"], '[datum_b]','[/datum_b]');
    $p_time_beleska = end($time_beleska);
    $ocena_beleska = get_string_between($row["beleske"], '[ocena_b]','[/ocena_b]');
    $broj_ocena = count($ocena_beleska);
    if($broj_ocena>0){
        $zbir_ocena = array_sum($ocena_beleska);
        $prosecn_ocena = $zbir_ocena/$broj_ocena;
        $prosecn_ocena1 = round($prosecn_ocena,1);
    }else{
        $prosecn_ocena1 = '';
    }


    $sve_beleske = '';
    $br_beleske = get_string_between($row["beleske"], '[br_b]', '[/br_b]');
    foreach( $br_beleske as $r_br ){
        $i = $r_br-1;
        $sve_beleske .= "<tr class='pojedinacna_beleska'>
                            <td>
                                <p style='margin:0'>" . $txt_beleske[$i] . "</p>
                                <p style='margin:0;margin-top:10px'>" . $user_beleska[$i] . "</p>
                                <p style='margin:0'>" . $time_beleska[$i] . "</p>
                                <p style='margin:0'>" . $ocena_beleska[$i] . "</p>
                            </td>
                        </tr>";
    }


    $output = "
            <a  href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/logout.php' ><button type='button'>Log out</button></a>
            <a  href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/adminpage.php' ><button type='button'>Sve prijave</button></a>
            <img style='width:200px;display: table;' src='uploads/" . $row["image_name"] . "' alt='Slika kandidata " . $row["ime"] . "'>
            <table style='width:auto'>
                <tr>
                    <th>Ime:</th>
                    <td>" . $row['ime'] . "</td>
                </tr>
                <tr>
                    <th>Prezime:</th>
                    <td>" . $row['prezime'] . "</td>
                </tr>
                <tr>
                    <th>ID:</th>
                    <td id='user_id'>" . $row['id'] . "</td>
                </tr>
                <tr>
                    <th>Radno mesto:</th>
                    <td id='user_id'>" . $row['pozicija'] . "</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>" . $row['email'] . "</td>
                </tr>
                <tr>
                    <th>Grad:</th>
                    <td>" . $row['mesto_stanovanja'] . "</td>
                </tr>
                <tr>
                    <th>Web stranica:</th>
                    <td>" . $row['web_stranica'] . "</td>
                </tr>
                <tr>
                    <th>Datum rođenja:</th>
                    <td>" . $row['datum'] . "</td>
                </tr>
                <tr>
                    <th>Mesto stanovanja:</th>
                    <td>" . $row['adresa'] . "</td>
                </tr>
                <tr>
                    <th>Poštanski broj:</th>
                    <td>" . $row['postanski_br'] . "</td>
                </tr>
                <tr>
                    <th>Broj telefona:</th>
                    <td>" . $row['br_telefona'] . "</td>
                </tr>
                <tr>
                    <th>Broj mobilnog:</th>
                    <td>" . $row['br_mobilnog'] . "</td>
                </tr>
                <tr>
                    <th>Stručna sprema:</th>
                    <td>" . $row['sprema'] . "</td>
                </tr>
                <tr>
                    <th>Zanimanje:</th>
                    <td>" . $row['zanimanje'] . "</td>
                </tr>
                <tr>
                    <th>Naziv zadnje obrazovne institucije i mjesto:</th>
                    <td>" . $row['zadnja_obrazovna_institucija'] . "</td>
                </tr>
                <tr>
                    <th>Dodatne edukacije:</th>
                    <td>" . $row['dodatne_edukacije'] . "</td>
                </tr>
                <tr>
                    <th>Trenutni status:</th>
                    <td>" . $row['trenutni_status'] . "</td>
                </tr>
                <tr>
                    <th>Dosadašnje iskustvo u poslovima osiguranja:</th>
                    <td>" . $row['iskustvo_u_osiguranju'] . "</td>
                </tr>
                <tr>
                    <th>koliko dugo:</th>
                    <td>" . $row['iskustvo_u_osiguranju_koliko'] . "</td>
                </tr>
                <tr>
                    <th>gdje:</th>
                    <td>" . $row['iskustvo_u_osiguranju_gdje'] . "</td>
                </tr>
                <tr>
                    <th>Dosadašnje iskustvo u poslovima prodaje:</th>
                    <td>" . $row['iskustvo_u_prodaji'] . "</td>
                </tr>
                <tr>
                    <th>koliko dugo:</th>
                    <td>" . $row['iskustvo_u_prodaji_koliko'] . "</td>
                </tr>
                <tr>
                    <th>prodaja čega:</th>
                    <td>" . $row['iskustvo_u_prodaji_cega'] . "</td>
                </tr>
                <tr>
                    <th>Aktivno znanje stranog jezika:</th>
                    <td>" . $row['znanje_stranog_jezika'] . "</td>
                </tr>
                <tr>
                    <th>Kojeg:</th>
                    <td>" . $row['strani_jezik'] . "</td>
                </tr>
                <tr>
                    <th>Rad na kompjuteru:</th>
                    <td>" . $row['rad_na_kompjuteru'] . "</td>
                </tr>
                <tr>
                    <th>Vozačka dozvola:</th>
                    <td>" . $row['vozacka_dozvola'] . "</td>
                </tr>
                <tr>
                    <th>Od posla zastupnika prodaje osiguranja očekujem:</th>
                    <td>" . $row['ocekivanja'] . "</td>
                </tr>
                <tr>
                    <th>Nešto drugo:</th>
                    <td>" . $row['ocekivanja_nesto_drugo'] . "</td>
                </tr>
                <tr>
                    <th>Slobodno vreme:</th>
                    <td>" . $row['slobodno_vreme'] . "</td>
                </tr>
                <tr>
                    <th>Osobine i Hobi:</th>
                    <td>" . $row['osobine_hobi'] . "</td>
                </tr>
                <tr>
                    <th>Školovanje u ESICHER ACADEMY:</th>
                    <td>" . $row['skolovanje_esicher'] . "</td>
                </tr>
                <tr>
                    <th>Preostalo vreme za dodatna pitanja</th>
                    <td>" . $row['timer'] . "</td>
                </tr>
                <tr>
                    <th>
                        NAZIV TVRTKE
                    </th>
                    <th>
                        RADNO MJESTO<br>
                        (poslovi koje ste obavljali)
                    </th>
                    <th>
                        RAZDOBLJE RADA<br>
                        (od - do)
                    </th>
                </tr>
                <tr>
                    <td>" . $row['iskustvoTvrtka1'] . "</td>
                    <td>" . $row['iskustvoMjesto1'] . "</td>
                    <td>" . $row['iskustvoRazdoblje1'] . "</td>
                </tr>
                <tr>
                    <td>" . $row['iskustvoTvrtka2'] . "</td>
                    <td>" . $row['iskustvoMjesto2'] . "</td>
                    <td>" . $row['iskustvoRazdoblje2'] . "</td>
                </tr>
                <tr>
                    <td>" . $row['iskustvoTvrtka3'] . "</td>
                    <td>" . $row['iskustvoMjesto3'] . "</td>
                    <td>" . $row['iskustvoRazdoblje3'] . "</td>
                </tr>
                <tr>
                    <td>" . $row['iskustvoTvrtka4'] . "</td>
                    <td>" . $row['iskustvoMjesto4'] . "</td>
                    <td>" . $row['iskustvoRazdoblje4'] . "</td>
                </tr>
                <tr>
                    <td>" . $row['iskustvoTvrtka5'] . "</td>
                    <td>" . $row['iskustvoMjesto5'] . "</td>
                    <td>" . $row['iskustvoRazdoblje5'] . "</td>
                </tr>";
                


    if( !empty($row['cv_name']) ){
        $output .= "<tr>
                        <th>Dodatni CV:</th>
                        <td><a  href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/uploads/" . $row['cv_name'] . "' >
                            <button type='button'>CV</button>
                        </a></td>
                    </tr>";
    }
                
                
    $output .= " <tr>
                    <th>Beleske:</th>
                    <td>
                        <p style='margin:0'>" . $p_txt_beleska. "</p>
                        <p style='margin:0;margin-top:10px'>" . $p_user_beleska. "</p>
                        <p style='margin:0'>" . $p_time_beleska. "</p>
                        <p style='margin:0'>" . $prosecn_ocena1. "</p>
                        <form id='userfor".$row["id"]."' action='update.php' method='post'>
                            <textarea name='beleske" . $row["id"] . "'></textarea><br>
                            <input  type='submit' value='Update'><br>
                            <input name='user_id' type='hidden' value='" . $row["id"] . "'><br>
                            <label style='margin-top:10px'>Ocena:<label>
                            <select name='ocena" . $row["id"] . "'>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                        </select>
                        </form>
                    </td>
                </tr>
                <tr>
                <th>Pošalji dodatnu formu:</th>";
    if ( $row["dodatna_forma"] == "Dodatna forma poslata." ){
        $output .= "<td id='dodatna_forma_polje'>
                        Dodatna forma poslata.
                    </td>";
    }else{
        $output .= "<td id='dodatna_forma_polje'>
                        <button id='dodatna_forma_button' type='button'>Pošalji</button>
                    </td>";
    }

    $output .=   "</tr>";

    if ( !empty( $row['timer'] ) ){

        $output .= "<tr>
                        <th>Zašto tražite posao?</th>
                        <td>" . $dp_row['zasto_trazite_posao'] . "</td>
                    </tr>
                    <tr>
                        <th>Kako vidite svoju karijeru kod nas?</th>
                        <td>" . $dp_row['karijera_kod_nas'] . "</td>
                    </tr>
                    <tr>
                        <th>Zbog čega baš kod nas?</th>
                        <td>" . $dp_row['zbog_cega_kod_nas'] . "</td>
                    </tr>
                    <tr>
                        <th>Detaljno opišete radno iskustvo.</th>
                        <td>" . $dp_row['detaljno_radno_iskustvo'] . "</td>
                    </tr>
                    <tr>
                        <th>Razlog napuštanja zadnja tri radna mesta.</th>
                        <td>" . $dp_row['razlog_napustanja_radnog_mesta'] . "</td>
                    </tr>
                    <tr>
                        <th>Ako ste se bavili osiguranjem, molim Vas detaljno navedite sva iskustva iz osiguranja.</th>
                        <td>" . $dp_row['detaljna_iskustva_osiguranja'] . "</td>
                    </tr>
                    <tr>
                        <th>Ako dolazite iz osiguranja, koji je razlog odlaska od bivšeg poslodavca (osiguravatelja)?</th>
                        <td>" . $dp_row['razlog_odlaska_od_poslodavca'] . "</td>
                    </tr>
                    <tr>
                        <th>Zašto mijenjate posao? (za one koji trenutno rade)</th>
                        <td>" . $dp_row['zasto_menjate_posao'] . "</td>
                    </tr>
                    <tr>
                        <th>Koliko je za Vas bitan posao?</th>
                        <td>" . $dp_row['koliko_je_bitan_posao'] . "</td>
                    </tr>
                    <tr>
                        <th>Koliko volite raditi?</th>
                        <td>" . $dp_row['koliko_volite_raditi'] . "</td>
                    </tr>
                    <tr>
                        <th>Koliko Vam je bitno radno vijeme?</th>
                        <td>" . $dp_row['koliko_je_bitno_radno_vreme'] . "</td>
                    </tr>
                    <tr>
                        <th>Jeli Vam svejedno koju smjenu radite? (kada bi radili u smjenama)</th>
                        <td>" . $dp_row['koju_smenu_radite'] . "</td>
                    </tr>
                    <tr>
                        <th>Živite sami ili sa roditeljima/djecom?</th>
                        <td>" . $dp_row['zivite_sami'] . "</td>
                    </tr>
                    <tr>
                        <th>Broj članova domaćinstva?</th>
                        <td>" . $dp_row['broj_clanova_domacinstva'] . "</td>
                    </tr>
                    <tr>
                        <th>Živite u stanu ili u kući?</th>
                        <td>" . $dp_row['zivite_u_stanu_ili_kuci'] . "</td>
                    </tr>
                    <tr>
                        <th>Jesu li zaposleni Vaši ukućani?</th>
                        <td>" . $dp_row['zaposlenost_ukucana'] . "</td>
                    </tr>
                    <tr>
                        <th>Jesu li sredstva u kući dovoljna za normalan život?</th>
                        <td>" . $dp_row['sredstva_u_kuci'] . "</td>
                    </tr>
                    <tr>
                        <th>Što bi za Vas značio Vaš prihod u kući?</th>
                        <td>" . $dp_row['vas_prihod_u_kuci'] . "</td>
                    </tr>";


    }
                
            
    $output .=   "</table>";

    $output .= "<table class='sve_beleske'>
                    <tr>
                        <th colspan='2'>Sve beleške</th>
                    </tr>";
    $output .= $sve_beleske;
    $output .= "</table>";

    echo $output;

    $conn->close();
}else{
    echo "Molimo Vas, ulogujte se <a href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/login.php'>ovde</a>.";
    
}
?>
    </body>
</html>