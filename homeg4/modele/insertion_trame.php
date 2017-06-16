<?php
function insert_trame($bdd, $t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec)
{
$req = $bdd->prepare('INSERT INTO trame (type_trame, n_groupe, requete, type_capteur, n_capteur, valeur, n_trame, checksum, annee, mois, jour, heure, minute, seconde) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array($type_trame, $n_groupe, $requete, $type_capteur, $n_capteur, $valeur, $n_trame, $checksum, $annee, $mois, $jour, $heure, $minute, $seconde));

}
?>