<?php

//TRA - OBJ - REQ - TYP - NUM - VAL - TIM

$tram ='100011301002B0125';

$type_tram = substr($tram, 0, 1); //1 - TYPE DE TRAM UTILISÉ - toujours la premiere tram
$objet = substr($tram, 1, 4); //4 - NUMERO D'EQUIPE - ne change jamais
$requete = substr($tram, 5, 1); //1 - IDENTIFIE LA COMMANDE - modifie l'etat du capteur
$type = substr($tram, 6,1); // 1 - LE TYPE DE CAPTEUR
$numero = substr($tram, 7, 2); //2 - NUMERO DE CAPTEUR
$valeur_capteur_hex = substr($tram, 9, 4); //4 - VALEUR DU CAPTEUR
$date = substr($tram, 13, 4); // 4 - DATE

$valeur_capteur_dec = hexdec($valeur_capteur_hex);
echo "<br>";
echo $valeur_capteur_dec;
echo $date;

?>


//TRAM DE RETOUR

// TRA - OBJ - REQ - TYP - NUM - ANS 