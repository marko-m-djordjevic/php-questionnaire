<!DOCTYPE html>
<html>
    <head>
        <title> prijava za posao </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="upitnik">
        <div class="esicher_logo">
            <img src='EG-LOGO1.jpg'>
        </div>
        <h2> Lični upitnik</h2>
        <form id="form1" action="thankyou.php" method="post" enctype="multipart/form-data">

            <div class="wrapper">
                <div class="pozicija">
                    <h4>Pozicija za koju se prijavljujete</h4>
                </div>
                <div class="radio_pozicija">
                    <p><input type="radio" name="pozicija" required value="Direktor prodaje BEOGRAD (m/ž)">Direktor prodaje BEOGRAD (m/ž)</p>
                    <p><input type="radio" name="pozicija" required value="Vođa prodaje">Vođa prodaje</p>
                    <p><input type="radio" name="pozicija" required value="Savetnike u osiguranju (m/ž)">Savetnike u osiguranju (m/ž)</p>
                    <p><input type="radio" name="pozicija" required value="Terenski savetnik u osiguranju – junior, senior (m/ž)">Terenski savetnik u osiguranju – junior, senior (m/ž)</p>
                    <p><input type="radio" name="pozicija" required value="ONLINE savetnik u osiguranju (m/ž) call centru">ONLINE savetnik u osiguranju (m/ž) call centru</p>
                </div>
            </div>

            <h3>I Podaci o kandidatu</h3>

            <div class="wrapper">
            <div class="label"><label>Profilna slika</label></div>
            <div class="input"><input type="file" name="profilna_slika" id="profilna_slika" required><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Ime</label></div>
            <div class="input"><input type="text" name="ime" required><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Prezime</label></div>
            <div class="input"><input type="text" name="prezime" required><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Email</label></div>
            <div class="input"><input type="text" name="email" required><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Web Stranica</label></div>
            <div class="input"><input type="text" name="web_stranica" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Datum rođenja</label></div>
            <div class="input"><input type="date" name="datum" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Mesto stanovanja</label></div>
            <div class="input"><input type="text" name="mesto_stanovanja" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Ulica / Trg i kućni broj</label></div>
            <div class="input"><input type="text" name="adresa" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Poštanski broj</label></div>
            <div class="input"><input type="text" name="postanski_br" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Broj telefona</label></div>
            <div class="input"><input type="text" name="br_telefona" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Broj mobilnog</label></div>
            <div class="input"><input type="text" name="br_mobilnog" ><br></div>
            <div class="clear"></div>
            </div>

            <hr>

            <h3>II Obrazovanje</h3>

            <div class="wrapper">
                <div class="label">
                    <label>Stručna sprema</label>
                </div>
                <div class="input">
                    <input type="radio" name="sprema" value="OŠ, KV">OŠ, KV<br>
                    <input type="radio" name="sprema" value="SSS">SSS<br>
                    <input type="radio" name="sprema" value="VŠS">VŠS<br>
                    <input type="radio" name="sprema" value="VSS">VSS<br>
                    <input type="radio" name="sprema" value="Poslijediplomski studij">Postdiplomske studije<br>
                </div>
                <div class="clear"></div>
            </div>


            <div class="wrapper">
            <div class="label"><label>Zanimanje</label></div>
            <div class="input"><input type="text" name="zanimanje" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Naziv zadnje obrazovne institucije i mesto</label></div>
            <div class="input"><input type="text" name="zadnja_obrazovna_institucija" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Dodatne edukacije</label></div>
            <div class="input"><input type="text" name="dodatne_edukacije" ><br></div>
            <div class="clear"></div>
            </div>

            <hr>

            <h3>III Radno iskustvo</h3>

            <div class="wrapper">
            <table border="0" cellpadding="1" cellspacing="1" width="100%">
            <tbody><tr>
                <td class="label">
                    NAZIV FIRME
                </td>
                <td class="label">
                    RADNO MESTO<br>
                    (poslovi koje Ste obavljali)
                </td>
                <td class="label">
                    RAZDOBLJE RADA<br>
                    (od - do)
                </td>
            </tr>
            <tr>
                <td>
                    <input maxlength="75" type="text" name="iskustvoTvrtka1" size="20">
                </td>
                <td>
                    <input maxlength="175" type="text" name="iskustvoMjesto1" size="20">
                </td>
                <td>
                    <input maxlength="75" type="text" name="iskustvoRazdoblje1" size="18">
                </td>
            </tr>
            <tr>
                <td>
                    <input maxlength="75" type="text" name="iskustvoTvrtka2" size="20">
                </td>
                <td>
                    <input maxlength="175" type="text" name="iskustvoMjesto2" size="20">
                </td>
                <td>
                    <input maxlength="75" type="text" name="iskustvoRazdoblje2" size="18">
                </td>
            </tr>
            <tr>
                <td>
                    <input maxlength="75" type="text" name="iskustvoTvrtka3" size="20">
                </td>
                <td>
                    <input maxlength="175" type="text" name="iskustvoMjesto3" size="20">
                </td>
                <td>
                    <input maxlength="75" type="text" name="iskustvoRazdoblje3" size="18">
                </td>
            </tr>
            <tr>
                <td>
                    <input maxlength="75" type="text" name="iskustvoTvrtka4" size="20">
                </td>
                <td>
                    <input maxlength="175" type="text" name="iskustvoMjesto4" size="20">
                </td>
                <td>
                    <input maxlength="75" type="text" name="iskustvoRazdoblje4" size="18">
                </td>
            </tr>
            <tr>
                <td>
                    <input maxlength="75" type="text" name="iskustvoTvrtka5" size="20">
                </td>
                <td>
                    <input maxlength="175" type="text" name="iskustvoMjesto5" size="20">
                </td>
                <td>
                    <input maxlength="75" type="text" name="iskustvoRazdoblje5" size="18">
                </td>
                </tr>
            </tbody></table>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Koji je vaš trenutni status?</label></div>
            <div class="input"><input type="text" name="trenutni_status" ><br></div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <label>
                Dosadašnje iskustvo u poslovima osiguranja</label>
                <div class="input">
                    <input type="radio" name="iskustvo_u_osiguranju" value="NE">NE<br>
                    <input type="radio" name="iskustvo_u_osiguranju" value="DA">DA - koliko dugo<br>
                    <input maxlength="49" type="text" name="iskustvo_u_osiguranju_koliko" size="4" class="auto"><br>
                    gde<br>
                    <input maxlength="200" type="text" name="iskustvo_u_osiguranju_gdje" size="20" class="auto"><br>
                </div>
                <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>
                Dosadašnje iskustvo u poslovima prodaje</label></div>
            <div class="input">
                <label><input type="radio" name="iskustvo_u_prodaji" value="NE">NE</label><br>
                <label><input type="radio" name="iskustvo_u_prodaji" value="DA">DA - koliko dugo</label><br>
                <input maxlength="49" type="text" name="iskustvo_u_prodaji_koliko" size="4" class="auto"><br>
                <label>prodaja čega </label><br>
                <input maxlength="190" type="text" name="iskustvo_u_prodaji_cega" class="auto" size="20"><br>
                </div>
                <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Ukupno radno iskustvo</label></div>
            <div class="input">
            <input type="text" maxlength="2" size="2"  name="ukupno_radno_iskustvo_g" >godina
            <input type="text" maxlength="2" size="2"  name="ukupno_radno_iskustvo_m" >meseci
            </div>
            <div class="clear"></div>
            </div>

            <hr>

            <h3>IV Ostalo</h3>

            <div class="wrapper">
            <div class="label"><label>Aktivno znanje stranog jezika</label></div>
            <div class="input">
            <input type="radio" name="znanje_stranog_jezika" value="DA">DA<br>
            <input type="radio" name="znanje_stranog_jezika" value="Djelomično">Delimično<br>
            <input type="radio" name="znanje_stranog_jezika" value="NE">NE<br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Kojeg</label></div>
            <div class="input">
            <input type="text" name="strani_jezik" ><br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Rad na kompjuteru</label></div>
            <div class="input">
            <input type="radio" name="rad_na_kompjuteru" value="DA">DA<br>
            <input type="radio" name="rad_na_kompjuteru" value="Djelomično">Delimično<br>
            <input type="radio" name="rad_na_kompjuteru" value="NE">NE<br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Vozačka dozvola</label></div>
            <div class="input">
            <input type="radio" name="vozacka_dozvola" value="DA">DA<br>
            <input type="radio" name="vozacka_dozvola" value="NE">NE<br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Od posla zastupnika prodaje osiguranja očekujem</label></div>
            <div class="input">
            <input type="radio" name="ocekivanja" value="Samostalnost i inicijativu u planiranju i obavljanju posla">
            <div class="tekst_ocekivanja">Samostalnost i inicijativu u planiranju i obavljanju posla</div>
            <input type="radio" name="ocekivanja" value="Da radim nešto dinamično i zanimljivo">
            <div class="tekst_ocekivanja">Da radim nešto dinamično i zanimljivo</div>
            <input type="radio" name="ocekivanja" value="Mogućnost ostvarivanja velike zarade">
            <div class="tekst_ocekivanja">Mogućnost ostvarivanja velike zarade</div>
            <input type="radio" name="ocekivanja" value="Da postanem deo snažne i perspektivne osiguravajuće kuće">
            <div class="tekst_ocekivanja">Da postanem deo snažne i perspektivne osiguravajuće kuće</div>
            <input type="radio" name="ocekivanja" value="Sigurnu platu i druga prava iz radnog odnosa">
            <div class="tekst_ocekivanja">Sigurnu platu i druga prava iz radnog odnosa</div>
            <input type="radio" name="ocekivanja" value="Terenski i dinamičan posao">
            <div class="tekst_ocekivanja">Terenski i dinamičan posao</div>
            <input type="radio" name="ocekivanja" value="Promenu svog dosadašnjeg posla">
            <div class="tekst_ocekivanja">Promenu svog dosadašnjeg posla</div>
            <input type="radio" name="ocekivanja" value="Da napredujem i učim nešto novo">
            <div class="tekst_ocekivanja">Da napredujem i učim nešto novo</div>
            <input type="radio" name="ocekivanja" value="Posao vezan za lične kontakte s ljudima">
            <div class="tekst_ocekivanja">Posao vezan za lične kontakte s ljudima</div>
            <input type="radio" name="ocekivanja" value="Nešto drugo">
            <div class="tekst_ocekivanja">Nešto drugo</div>
            <input type="text" name="ocekivanja_nesto_drugo" ><br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Slobodno vreme</label></div>
            <div class="input">
            <input type="text" name="slobodno_vreme" ><br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Osobine i Hobi</label></div>
            <div class="input">
            <input type="text" name="osobine_hobi" ><br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Želim školovanje</label></div>
            <div class="input">
            <input type="radio" name="skolovanje_esicher" value="DA" >DA<br>
            <input type="radio" name="skolovanje_esicher" value="NE" >NE<br>
            </div>
            <div class="clear"></div>
            </div>

            <div class="wrapper">
            <div class="label"><label>Ukoliko želite dodati vaš CV, izaberite ga ovde</label></div>
            <div class="input">
            <input type="file" name="cv" ><br>
            </div>
            </div>
            <div class="clear"></div>
            </div>

            <hr>
            <br>
            <input  type="submit" value="POŠALJI"><br><br>
            
        </form>
        
    </body>
</html>