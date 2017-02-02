<?php
include("modele/connexion_base.php");

/*function read_lampe($bdd)
{
	$reponse = $bdd -> prepare('SELECT capteurs.id,type, id_utilisateur 
		FROM capteurs,pieces 
		WHERE capteurs.id_piece = pieces.id 
		AND capteurs.type = "light"');
	$reponse -> execute(array());
	return $reponse;
}

function update_lampe_on($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET type = 1 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}

function update_lampe_off ($bbd, $id_capteur)
{
	$reponse = $bbd -> prepare('UPDATE capteurs SET type = 0 WHERE id = ?');
	$reponse -> execute(array($id_capteur));
}*/

function insert_scenario ($bdd, $nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $action)
{
	$reponse = $bdd -> prepare('INSERT INTO scenarios(nom_scenario, date_debut, date_fin, heure_debut, $action) VALUES (?, ?, ?, ?, ?)');
	$reponse -> execute($nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $action);
}
?>
