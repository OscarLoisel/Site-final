<?php

	$reponse = nbr_utilisateur($bdd);
	$nbr_utilisateur = sizeof($reponse);
	echo $nbr_utilisateur;

	$entete = enteteAdmin("home_admin");
	$aside = asideAdmin2($nbr_utilisateur);
	$contenu = acceuiladmin();
	$pied = pied();

	include'gabarit.php';
?>