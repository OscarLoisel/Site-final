<?php
include_once("modele/connexion_base.php");

function read_volet_commun($bdd, $id_piece, $id_utilisateur) // Renvoi tous les ID des capteurs de volet de la base de donnée de l'utilisateur connecté.
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = ? 
		AND capteurs.type = "volet"
		AND pieces.id_utilisateur = ?');
	$reponse->execute(array($id_piece, $id_utilisateur));
	return $reponse;
}

function update_volet_commun_on($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET etat = 1 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}

function update_volet_commun_off ($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET etat = 0 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}


?>