<?php

	$entete = enteteAdmin("home_admin");
	$aside = asideAdmin2($nbr_utilisateur);
	$contenu = acceuiladmin();
	$pied = pied();

	include'gabarit.php';
?>