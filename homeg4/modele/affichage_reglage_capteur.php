<?php
require("modele/connexion_base.php");

function affichage_table_capteur{
	$reponse = $bdd ->prepare('SELECT * FROM capteur WHERE id_piece = ?');
	$reponse -> execute(array($bdd, $id_piece));
	return $reponse;
}

function affichage_table_donnees {
	$reponse = $bdd ->prepare('SELECT * FROM donnees WHERE id_capteur = ?');
	$reponse -> execute(array($bdd, $id_capteur));
	return $reponse;
}
?>