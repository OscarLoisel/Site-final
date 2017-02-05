<?php

	$entete = enteteConnexion();
	$aside = asideHorsConnexion();
	$contenu = forminscription($erreur);
	$pied = pied();

	include 'gabarit.php';
?>