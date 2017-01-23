<?php
require("modele/connexion_base.php");

function affichage_table_capteur($bdd, $id_piece)
{
	$reponse = $bdd ->prepare('SELECT * FROM capteurs WHERE id_piece = ?');
	$reponse -> execute(array($id_piece));
	return $reponse;
}

function affichage_table_donnees($bdd, $id_capteur)
{
	$req = $bdd ->prepare('SELECT * FROM donnees WHERE id_capteur = ?');
	$req -> execute(array($id_capteur));
	return $req;
}
?>