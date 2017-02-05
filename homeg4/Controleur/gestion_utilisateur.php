<?php
require("modele/connexion_base.php");

if(isset($_GET['confirm']) AND !empty($_GET['confirm']))
{
	$confirm = (int) $_GET['confirm'];

	$reponse = $bdd-> prepare('UPDATE utilisateur SET confirm = 1 WHERE id = ?');
	$reponse-> execute(array($confirm));
}

if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
	$delete = (int) $_GET['delete'];

	$reponse = $bdd-> prepare('DELETE FROM utilisateur WHERE id = ? ');
	$reponse-> execute(array($delete));
	$reponse = $bdd-> prepare('DELETE FROM pieces WHERE id_utilisateur = ?');
	$reponse-> execute(array($delete));
	$reponse = $bdd-> prepare('DELETE FROM donnees WHERE id_utilisateur = ?');
	$reponse-> execute(array($delete));
	$reponse = $bdd-> prepare('DELETE FROM donnees_reçu WHERE id_utilisateur = ?');
	$reponse-> execute(array($delete));
	$reponse = $bdd-> prepare('DELETE FROM scenarios WHERE id_utilisateur = ?');
	$reponse-> execute(array($delete));
}

?>
 

