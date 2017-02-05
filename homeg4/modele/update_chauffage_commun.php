<?php
include_once("modele/connexion_base.php");

function read_chauffage_commun($bdd, $id_utilisateur, $id_piece) // Renvoi tous les ID des capteurs de chauffage de la base de donnée de l'utilisateur connecté.
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = ? 
		AND capteurs.type = "temperature"
		AND pieces.id_utilisateur = ?');
	$reponse->execute(array($id_utilisateur, $id_piece));
	return $reponse;
}

function update_chauffage_commun_on($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET etat = 1 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}

function update_chauffage_commun_off ($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET etat = 0 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}

?>