<?php


$capteur_temp = read_temp($bdd,$_SESSION["id"]);
$capteur_temp2 = $capteur_temp -> fetchAll();
$nb_capteur = sizeof($capteur_temp2);
$somme = 0;
for ($i=0; $i < $nb_capteur; $i++)
{ 
	//echo($reponse[$i][0]);
	//echo('<br />');
	$donnees = recup_donnees($bdd,$capteur_temp2[$i][0]);
	$valeur = $donnees -> fetch();
	if($donnees -> rowcount() == 0)
		{
			echo('ya rien lol');
		}
	echo($valeur[0]);
	echo('<br />');
	$somme += $valeur[0];
	$nombre = $i+1;
}

$moyenne = $somme/$nombre;
echo($moyenne);

$entete = entete("reglage");
//$aside = asideReglage("edition_profil");
$aside = aside("cgu",$moyenne);





$contenu ='';
$pied = pied();

include('gabarit.php');

?>