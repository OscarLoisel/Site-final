<?php

	function recup_valeur_temp($bdd,$id)
	{
		$reponse= $bdd -> prepare("SELECT donnees.valeur FROM donnees,capteurs,utilisateur WHERE donnees.id_capteur = capteurs.id AND capteurs.type = 'temperature' AND utilisateur.id = $id");
		$reponse->execute(array());
		return $reponse;
	}