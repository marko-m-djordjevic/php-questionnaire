<?php
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $br_karaktera = strlen($string);
    $izlaz = array();
    $pocetak = 0;
    $i=0;
    $tr_string = $string;

    while(strpos($tr_string,$start)){
        $pstart = strpos($tr_string,$start);
        $pstart += strlen($start);//pocetak trazenog stringa
        $kend = strpos($tr_string, $end);
        $kend += strlen($end);//pozicija kraja $end stringa
        $dtstr = strpos($tr_string, $end, $pstart) - $pstart;//duzina trazenog stringa
        $izlaz[$i]= substr($tr_string, $pstart,$dtstr);
        $pocetak = $kend;
        $tr_string = substr($tr_string, $pocetak);//prikazuje ostatak stringa koji nije upisan u array
        $i++;
    }
    return $izlaz;
}