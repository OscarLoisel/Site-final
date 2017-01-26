<?php
include("modele/connexion_base.php");

function insertdonnees($bdd, $valeur_capteur_hex, $date, $numero)
{
	$reponse = $bdd-> prepare("INSERT INTO donnees(valeur,date_capteur,id_capteur) VALUES(?, ?, ?)");
	$reponse -> execute(array(?,?,?));
}

?>