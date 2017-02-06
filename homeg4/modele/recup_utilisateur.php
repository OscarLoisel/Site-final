<?php
function nbr_utilisateur($bdd)
{
	$reponse = $bdd -> query("SELECT * FROM utilisateur");
	return $reponse;
	$nbr_utilisateur = sizeof($reponse);
	echo $nbr_utilisateur;
}
?>