<?php

	$entete = enteteConnexion();
	$aside = asideHorsConnexion();
	/*$contenu = '<div id="page_inscription">';*/
	$contenua = forminscription('');
	/*$contenu .= '</div>';*/
	$pied = pied();

	include 'gabarit_accueil.php';
?>