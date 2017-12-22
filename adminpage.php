
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="adminpage">
<?php
require 'functions.php';

$_SESSION["page"] = 'all';

if (isset($_GET["page"])){
    $page  = $_GET["page"];
} else { 
    $page=1; 
};
$results_per_page = 20;
$start_from = ($page-1) * $results_per_page;

if (  $_SESSION["login"] == 1 ){
    require 'connection.php';
    $conn    = Connect();

    $query = "SELECT * FROM tb_cform LIMIT " . $start_from . ", " . $results_per_page . "";
    $success = $conn->query($query);

    if ($success->num_rows > 0) {
        // output data of each row

        $output = "
        <a  href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/logout.php' >
            <button type='button'>Log out</button>
        </a>
        <table style='width:auto;'>
            <tr>
                <th>Slika</th>
                <th>Ime</th> 
                <th>Prezime</th>
                <th>Grad</th>
                <th>Beleske</th>
                </tr>";

        while($row = $success->fetch_assoc()) {
            
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
            
            $output .= "
            <tr>
                <td>
                    <a href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/singleuserpage.php?id=" . $row["id"] . "'>
                        <img style='width:200px;' src='uploads/" . $row["image_name"] . "' alt='Slika kandidata " . $row["ime"] . "'>
                    </a>
                </td>
                <td>" . $row["ime"]. "</td> 
                <td>" . $row["prezime"]. "</td>
                <td>" . $row["mesto_stanovanja"]. "</td>
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
                </tb>
            </tr>";
        }
        $output .= "</table>";
        echo $output;
    } else {
        echo "0 results";
    }

    $sql2 = "SELECT COUNT(ID) AS total FROM tb_cform"; 
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $total_pages = ceil($row2["total"] / $results_per_page);

    for ($i=1; $i<=$total_pages; $i++) { 
        echo "<a href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/adminpage.php?page=".$i."'>".$i."</a> "; 
    };

    $conn->close();

    

}else{
    echo "Molimo Vas, ulogujte se <a href='http://" .$_SERVER['SERVER_NAME']. "/rs/prijava/login.php'>ovde</a>.";

}
?>
    </body>
</html>