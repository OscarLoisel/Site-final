<?php
require("modele/connexion_base.php");

function affichage_table_capteur($bdd, $id_piece)
{
	$reponse = $bdd ->prepare('SELECT * FROM capteur WHERE id_piece = ?');
	$reponse -> execute(array($id_piece));
	return $reponse;
}

function affichage_table_donnees($bdd, $id_capteur)
{
	$reponse = $bdd ->prepare('SELECT * FROM donnees WHERE id_capteur = ?');
	$reponse -> execute(array($id_capteur));
	return $reponse;
}
?>