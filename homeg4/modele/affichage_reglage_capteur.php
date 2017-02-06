<?php
require("modele/connexion_base.php");

function affichage_table_capteur($bdd, $id_piece, $type)
{
	$reponse = $bdd ->prepare('SELECT * FROM capteurs WHERE id_piece = ? AND type = ?');
	$reponse -> execute(array($id_piece, $type));
	return $reponse;
}

function 	affichage_table_donnees($bdd, $id_capteur)
{
	$req = $bdd ->prepare('SELECT * FROM donnees WHERE id_capteur = ? ORDER BY date_capteur DESC');
	$req -> execute(array($id_capteur));
	return $req;
}

if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
	$delete = (int) $_GET['delete'];

	$reponse = $bdd-> prepare('DELETE FROM capteurs WHERE id = ?');
	$reponse-> execute(array($delete));
}
?>