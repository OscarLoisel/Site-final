<?php

$entete = entete("reglage");
$aside = asideReglage("edition_profil");


$test = read_temp($bdd,$_SESSION["id"]);
$reponse = $test -> fetchAll();
$nb_capteur = sizeof($reponse);
for ($i=0; $i < $nb_capteur; $i++)
{ 
	echo($reponse[$i][0]);
	echo('<br />');
	$donnees = recup_donnees($bdd,$reponse[$i][0]);
	$valeur = $donnees -> fetch();
	if($donnees -> rowcount() == 0)
		{
			echo('ya rien lol');
		}
	echo($valeur[0]);
	echo('<br />');

}
$contenu ='';
$pied = pied();

include('gabarit.php');

?>