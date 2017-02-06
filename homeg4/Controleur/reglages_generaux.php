<?php
require("modele/connexion_base.php");

if(isset($_GET['delete_piece']) AND !empty($_GET['delete_piece']))
{
	$delete_piece = $_GET['delete_piece'];

	$reponse = $bdd-> prepare('DELETE FROM pieces WHERE piece = ? ');
	$reponse-> execute(array($delete_piece));
}

?>