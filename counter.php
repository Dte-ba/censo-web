<?php

$region = $_GET["region"];
$cue = $_GET["cue"];

$file_reg = 'counter/' . $region . '_counter.txt';

// counter
if (!file_exists($file_reg)){
        touch ($file_reg);
}

$datei = fopen($file_reg, "r");
$count = fgets($datei, 1000);
fclose($datei);

$count=$count + 1 ;
if (is_writable($file_reg)) {

    $datei = fopen($file_reg, "w");
    fwrite($datei, $count);
    fclose($datei);

} else {
    echo "El archivo $file_reg no es escribible";
}

// cue
$file_cue = 'counter/' . $region .  '_cues.txt';
if (!file_exists($file_cue)){
    touch ($file_cue);
}

if (is_writable($file_cue)) {
    $datei = fopen($file_cue, "r");
    $fcontent = fread($datei, filesize($file_cue));
    $towrite = "$fcontent \n $cue";
    fclose($datei);
    
    $datei = fopen($file_cue, "w+");
    fwrite($datei, $towrite);
    fclose($datei);

} else {
    echo "El archivo $file_cue no es escribible";
}

?>