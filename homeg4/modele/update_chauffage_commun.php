<?php
include_once("modele/connexion_base.php");

function read_chauffage_commun($bdd, $id_piece, $id_utilisateur) // Renvoi tous les ID des capteurs de chauffage de la base de donnée de l'utilisateur connecté.
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = ? 
		AND capteurs.type = "temperature"');
	$reponse->execute(array($id_piece, $id_utilisateur));
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

function insert_valeur_chauffage_commun ($bdd, $valeur, $date_capteur, $id_capteur, $id_utilisateur) // Insère dans la BDD données la valeur choisi par l'utilisateur.
{
	$reponse = $bdd -> prepare('INSERT INTO donnees(valeur, date_capteur, id_capteur, id_utilisateur) VALUES (?, ?, ?, ?)');
	$reponse -> execute(array($valeur, $date_capteur, $id_capteur, $id_utilisateur));
}

?>