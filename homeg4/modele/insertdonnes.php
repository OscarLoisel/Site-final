<?php
include("modele/connexion_base.php");

function insertdonnees($bdd, $valeur_capteur_hex, $date, $numero, $id_utilisateur)
{
	$reponse = $bdd-> prepare("INSERT INTO donnees(valeur,date_capteur,id_capteur, id_utilisateur) VALUES(?, ?, ?, ?)");
	$reponse -> execute(array($valeur_capteur_hex, $date, $numero, $id_utilisateur));
}

?>