<?php
include("modele/connexion_base.php");

function read_lampe($bdd, $id_utilisateur)
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = pieces.id 
		AND capteurs.type = "light"
		AND pieces.id_utilisateur = ?');
	$reponse->execute(array($id_utilisateur));
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
}


/*function select_id_piece ($bdd, $id_utilisateur)
{
	$reponse = $bdd -> prepare('SELECT id FROM pieces WHERE id_utilisateur = ?');
	$reponse-> execute($id_utilisateur);
	return $reponse;
}
function select_all_etat($bdd, $id_piece, $type)
{
	$reponse = $bdd -> prepare('SELECT * FROM capteurs WHERE id_piece = ? AND type = ?');
	$reponse -> execute($id_piece, $type);
	return $reponse;
}*/

?>