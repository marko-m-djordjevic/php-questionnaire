
window.onload = function() {
    var count=1800; //30 min
    var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

    function trigerAJAX() {
        var zasto_trazite_posao = document.getElementById('zasto_trazite_posao').value;
        var karijera_kod_nas = document.getElementById('karijera_kod_nas').value;
        var zbog_cega_kod_nas = document.getElementById('zbog_cega_kod_nas').value;
        var detaljno_radno_iskustvo = document.getElementById('detaljno_radno_iskustvo').value;
        var razlog_napustanja_radnog_mesta = document.getElementById('razlog_napustanja_radnog_mesta').value;
        var detaljna_iskustva_osiguranja = document.getElementById('detaljna_iskustva_osiguranja').value;
        var razlog_odlaska_od_poslodavca = document.getElementById('razlog_odlaska_od_poslodavca').value;
        var zasto_menjate_posao = document.getElementById('zasto_menjate_posao').value;
        var koliko_je_bitan_posao = document.getElementById('koliko_je_bitan_posao').value;
        var koliko_volite_raditi = document.getElementById('koliko_volite_raditi').value;
        var koliko_je_bitno_radno_vreme = document.getElementById('koliko_je_bitno_radno_vreme').value;
        var koju_smenu_radite = document.getElementById('koju_smenu_radite').value;
        var zivite_sami = document.getElementById('zivite_sami').value;
        var broj_clanova_domacinstva = document.getElementById('broj_clanova_domacinstva').value;
        var zivite_u_stanu_ili_kuci = document.getElementById('zivite_u_stanu_ili_kuci').value;
        var zaposlenost_ukucana = document.getElementById('zaposlenost_ukucana').value;
        var sredstva_u_kuci = document.getElementById('sredstva_u_kuci').value;
        var vas_prihod_u_kuci = document.getElementById('vas_prihod_u_kuci').value;
        
        var timer = document.getElementById('timer').value;
        var userID = document.getElementById('userid').value;
        var db_time = document.getElementById('db_timer').value;
        var podaci = 'zasto_trazite_posao=' + zasto_trazite_posao + 
                    '&karijera_kod_nas=' + karijera_kod_nas + 
                    '&zbog_cega_kod_nas=' + zbog_cega_kod_nas + 
                    '&detaljno_radno_iskustvo=' + detaljno_radno_iskustvo + 
                    '&razlog_napustanja_radnog_mesta=' + razlog_napustanja_radnog_mesta + 
                    '&detaljna_iskustva_osiguranja=' + detaljna_iskustva_osiguranja + 
                    '&razlog_odlaska_od_poslodavca=' + razlog_odlaska_od_poslodavca +
                    '&zasto_menjate_posao=' + zasto_menjate_posao +
                    '&koliko_je_bitan_posao=' + koliko_je_bitan_posao +
                    '&koliko_volite_raditi=' + koliko_volite_raditi +
                    '&koliko_je_bitno_radno_vreme=' + koliko_je_bitno_radno_vreme +
                    '&koju_smenu_radite=' + koju_smenu_radite +
                    '&zivite_sami=' + zivite_sami +
                    '&broj_clanova_domacinstva=' + broj_clanova_domacinstva +
                    '&zivite_u_stanu_ili_kuci=' + zivite_u_stanu_ili_kuci +
                    '&zaposlenost_ukucana=' + zaposlenost_ukucana +
                    '&sredstva_u_kuci=' + sredstva_u_kuci +
                    '&vas_prihod_u_kuci=' + vas_prihod_u_kuci +
                    "&timer=" + timer + 
                    "&userid=" + userID;
        
        

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if( db_time ){
                document.getElementById("dodatna_pitanja").innerHTML = "<h3>Već ste uneli podatke u bazu!</h3>";
            }else{
                document.getElementById("dodatna_pitanja").innerHTML = "Poruka prilikom slanja forme.";
            }
          }
        };
        xhttp.open("POST", "thankyou2.php", false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(podaci);
    }



    
    

    function timer(){
        count--;
        if (count == 0){

            document.getElementById("timer").value="Isteklo vreme";
            document.getElementById('submit_button').click();
            clearInterval(counter);
            //counter ended
            return;
        }

        
        var count_m = parseInt(count / 60);
        var count_s = count % 60;

        if ( count_s.toString().length == 2 ){
            document.getElementById("timer").value=count_m + ":" + count_s;
        }else{
            document.getElementById("timer").value=count_m + ":0" + count_s;
        }
    }

    document.getElementById('submit_button').onclick = function() {
        trigerAJAX();
    };

    window.onbeforeunload = function() {
        window.onunload = function() {
            document.getElementById('submit_button').click();
            console.log("klik");
            return 'Da li ste sigurni da želite da napustite stranicu?';
        }
        return 'Da li ste sigurni da želite da napustite stranicu?';
    };
    

};
