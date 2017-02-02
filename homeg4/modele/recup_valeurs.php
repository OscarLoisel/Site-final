<?php

	function recup_donnees($bdd,$id_capteur)
	{
		$reponse= $bdd -> prepare("SELECT valeur FROM donnees WHERE id_capteur = $id_capteur");
		$reponse->execute(array($id_capteur));
		return $reponse;
	}

	function read_temp($bdd, $id_utilisateur)
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = pieces.id 
		AND capteurs.type = "temperature"
		AND pieces.id_utilisateur = ?');
	$reponse->execute(array($id_utilisateur));
	return $reponse;
}

	function read_hum($bdd, $id_utilisateur)
{
	$reponse = $bdd -> prepare('SELECT capteurs.id 
		FROM capteurs, pieces 
		WHERE capteurs.id_piece = pieces.id 
		AND capteurs.type = "humidite"
		AND pieces.id_utilisateur = ?');
	$reponse->execute(array($id_utilisateur));
	return $reponse;
}