<?php

	$entete = enteteConnexion();
	$aside = asideHorsConnexion();
	$contenua = forminscription();
	$contenua.= $erreur;
	$pied = pied();

	include 'gabarit.php';
?>