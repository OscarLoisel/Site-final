<?php

	$entete = enteteConnexion();
	$aside = asideHorsConnexion();
	$contenu = forminscription();
	$contenu.= $erreur;
	$pied = pied();

	include 'gabarit.php';
?>