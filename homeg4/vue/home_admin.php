<?php

	$reponse = nbr_utilisateur($bdd);
	$data = $reponse->fetchAll();
	$nbr_utilisateur = sizeof($data);

	$entete = enteteAdmin("home_admin");
	$aside = asideAdmin2($nbr_utilisateur);
	$contenu = acceuiladmin();
	$pied = pied();

	include'gabarit.php';
?>