<?php
include_once("modele/connexion_base.php");

function read_chauffage($bdd, $id_utilisateur)
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = pieces.id 
		AND capteurs.type = "temperature"
		AND pieces.id_utilisateur = ?');
	$reponse->execute(array($id_utilisateur));
	return $reponse;
}

function update_chauffage_on($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET etat = 1 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}

function update_chauffage_off ($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET etat = 0 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}

/*function insert_scenario ($bdd, $nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $action, $etat)
{
	$reponse = $bdd -> prepare('INSERT INTO scenarios(nom_scenario, date_debut, date_fin, heure_debut, heure_fin, action, etat) VALUES(?, ?, ?, ?, ?, ?, ?)');
	$reponse -> execute(array($nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $action, $etat));
}*/

?>