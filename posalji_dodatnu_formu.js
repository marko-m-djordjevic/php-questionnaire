window.onload = function() {
    function posaljiDodatnuFormu(){
        var user_id = document.getElementById('user_id').innerHTML;
        var dodatnaFormaPodaci = "id="+user_id;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
                document.getElementById("dodatna_forma_polje").innerHTML = "Dodatna forma je poslata.";
            
        }
        };
        xhttp.open("POST", "posalji_dodatnu_formu.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(dodatnaFormaPodaci);
    }

    document.getElementById('dodatna_forma_button').onclick = function() {
        posaljiDodatnuFormu();
    };
}