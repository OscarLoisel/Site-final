<?php
include_once("modele/connexion_base.php");

function read_info_utilisateur($bdd, $id_utilisateur) 
{
	$reponse = $bdd -> prepare("SELECT capteurs.id, capteurs.id_piece, capteurs.type, capteurs.etat, capteurs.n_serie FROM capteurs, pieces WHERE pieces.id_utilisateur = ?");
	$data = $reponse->execute(array($id_utilisateur));
	$return = $reponse;
}

?>