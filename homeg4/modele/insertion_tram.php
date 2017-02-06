<?php
include("modele/connexion_base.php");

function readutilisateurs($bdd)
{
	$reponse = $bdd -> query("SELECT * FROM utilisateur");
	return $reponse;
}

function insertdonnees($bdd, $valeur_capteur_hex, $date, $numero, $id_utilisateur)
{
	$reponse = $bdd-> prepare("INSERT INTO donnees(valeur,date_capteur,id_capteur, id_utilisateur) VALUES(?, ?, ?, ?) WHERE id_utilisateur = ?");
	$reponse -> execute(array($valeur_capteur_hex, $date, $numero, $id_utilisateur));
}

?>