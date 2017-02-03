<?php
include_once("modele/connexion_base.php");

function read_alarme($bdd, $id_utilisateur) // Renvoi tous les ID des capteurs de chauffage de la base de donnée de l'utilisateur connecté.
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = pieces.id 
		AND capteurs.type = "presence"
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

function insert_valeur_chauffage ($bdd, $valeur, $date_capteur, $id_capteur, $id_utilisateur) // Insère dans la BDD données la valeur choisi par l'utilisateur.
{
	$reponse = $bdd -> prepare('INSERT INTO donnees(valeur, date_capteur, id_capteur, id_utilisateur) VALUES (?, ?, ?, ?)');
	$reponse -> execute(array($valeur, $date_capteur, $id_capteur, $id_utilisateur));
}

/*function insert_scenario ($bdd, $nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $etat, $id_utilisateur)
{
	$reponse = $bdd -> prepare('INSERT INTO scenarios(nom_scenario, date_debut, date_fin, heure_debut, heure_fin, valeur, type_scenario, etat, id_utilisateur) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$reponse -> execute(array($nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, $etat, $id_utilisateur));
}*/

?>