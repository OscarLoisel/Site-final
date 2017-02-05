<?php

	$entete = enteteConnexion();
	$aside = asideHorsConnexion();
	$contenua = forminscription($erreur);
	$pied = pied();

	include 'gabarit_accueil.php';
?>