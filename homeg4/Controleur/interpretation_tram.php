<?php

$tram ='100011301002B0125';

$type_tram = substr($tram, 0, 1); //1
$objet = substr($tram, 1, 4); //4
$requete = substr($tram, 5, 1); //1
$type = substr($tram, 6,1); // 1
$numero = substr($tram, 7, 2); //2
$valeur_capteur_hex = substr($tram, 9, 4); //4
$temps = substr($tram, 13, 4); // 4

$valeur_capteur_dec = hexdec($valeur_capteur_hex);
echo "<br>";
echo $valeur_capteur_dec;

?>