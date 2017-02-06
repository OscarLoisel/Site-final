<?php
function nbr_utilisateur($bdd)
{
	$reponse = $bdd -> query("SELECT * FROM utilisateur");
	return $reponse;
}
?>