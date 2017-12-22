<?php

$id = $_GET["id"];
require 'connection.php';
$conn    = Connect();
$req = "SELECT * FROM tb_cform WHERE id='" . $id ."'";
$success_req = $conn->query($req);
$ada = $success_req->fetch_assoc();
$time_f_db = $ada['timer'];


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Simple PHP contact form with MySQL and Form Validation </title>
        <meta charset="utf-8">
        <script src="timer.js"></script>
        <link rel="stylesheet" href="style.css">
        
    </head>
    <body id="dodatna_pitanja" class="dodatna_pitanja">
        <h3 id='text_za_promenu' > Dodatna pitanja</h3>
        <div class="dodatna_forma">
            <form id="form2"  method="post">
                <label>Zašto tražite posao?</label><br>
                <textarea type="text" id="zasto_trazite_posao" name="zasto_trazite_posao" rows="8" cols="80" ></textarea><br>
                
                <label>Kako vidite svoju karijeru kod nas?</label><br>
                <textarea type="text" id="karijera_kod_nas" name="karijera_kod_nas" rows="8" cols="80" ></textarea><br>

                <label>Zbog čega baš kod nas?</label><br>
                <textarea type="text" id="zbog_cega_kod_nas" name="zbog_cega_kod_nas" rows="8" cols="80" ></textarea><br>

                <label>Detaljno opišete radno iskustvo.</label><br>
                <textarea type="text" id="detaljno_radno_iskustvo" name="detaljno_radno_iskustvo" rows="8" cols="80" ></textarea><br>

                <label>Razlog napuštanja zadnja tri radna mesta.<br>
                (Ukoliko ste bez iskustva, na Vas se ne odnosi ovo pitanje.)<br>
                Ukoliko nemate zadnja 3 poslodavca, opišite onoliko koliko ih imate.</label><br>
                <textarea type="text" id="razlog_napustanja_radnog_mesta" name="razlog_napustanja_radnog_mesta" rows="8" cols="80" ></textarea><br>

                <label>Ako ste se bavili osiguranjem, molim Vas detaljno navedite sva iskustva iz osiguranja.</label><br>
                <textarea type="text" id="detaljna_iskustva_osiguranja" name="detaljna_iskustva_osiguranja" rows="8" cols="80" ></textarea><br>

                <label>Ako dolazite iz osiguranja, koji je razlog odlaska od bivšeg poslodavca (osiguravatelja)?</label><br>
                <textarea type="text" id="razlog_odlaska_od_poslodavca" name="razlog_odlaska_od_poslodavca" rows="8" cols="80" ></textarea><br>

                <label>Zašto mijenjate posao? (za one koji trenutno rade)</label><br>
                <textarea type="text" id="zasto_menjate_posao" name="zasto_menjate_posao" rows="8" cols="80" ></textarea><br>

                <label>Koliko je za Vas bitan posao?</label><br>
                <textarea type="text" id="koliko_je_bitan_posao" name="koliko_je_bitan_posao" rows="8" cols="80" ></textarea><br>

                <label>Koliko volite raditi?</label><br>
                <textarea type="text" id="koliko_volite_raditi" name="koliko_volite_raditi" rows="8" cols="80" ></textarea><br>

                <label>Koliko Vam je bitno radno vijeme?</label><br>
                <textarea type="text" id="koliko_je_bitno_radno_vreme" name="koliko_je_bitno_radno_vreme" rows="8" cols="80" ></textarea><br>

                <label>Jeli Vam svejedno koju smjenu radite? (kada bi radili u smjenama)</label><br>
                <textarea type="text" id="koju_smenu_radite" name="koju_smenu_radite" rows="8" cols="80" ></textarea><br>

                <label>Živite sami ili sa roditeljima/djecom?</label><br>
                <textarea type="text" id="zivite_sami" name="zivite_sami" rows="8" cols="80" ></textarea><br>

                <label>Broj članova domaćinstva?</label><br>
                <textarea type="text" id="broj_clanova_domacinstva" name="broj_clanova_domacinstva" rows="8" cols="80" ></textarea><br>

                <label>Živite u stanu ili u kući?</label><br>
                <textarea type="text" id="zivite_u_stanu_ili_kuci" name="zivite_u_stanu_ili_kuci" rows="8" cols="80" ></textarea><br>

                <label>Jesu li zaposleni Vaši ukućani?</label><br>
                <textarea type="text" id="zaposlenost_ukucana" name="zaposlenost_ukucana" rows="8" cols="80" ></textarea><br>

                <label>Jesu li sredstva u kući dovoljna za normalan život?</label><br>
                <textarea type="text" id="sredstva_u_kuci" name="sredstva_u_kuci" rows="8" cols="80" ></textarea><br>

                <label>Što bi za Vas značio Vaš prihod u kući?</label><br>
                <textarea type="text" id="vas_prihod_u_kuci" name="vas_prihod_u_kuci" rows="8" cols="80" ></textarea><br>

                <input type="hidden" name="elapsed_time" id="timer">
                <input type="hidden" name="db_timer" id="db_timer" value=<?php echo $time_f_db?> >

                <input type="hidden" id="userid" name="ID" value=<?php echo $id?> ><br>

                <input id="submit_button" type="button" value="POŠALJI"><br>
            </form>
        </div>
        <h5 id="submit_poruka"></h5>

    </body>
</html>