<?php

function moyenne_temperature($bdd,$id)
{
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
        /*if($donnees -> rowcount() == 0)
            {
                echo('ya rien lol');
            }*/
        //echo($valeur[0]);
        //echo('<br />');
        $somme += $valeur[0];
        $nombre = $i+1;
	}

$moyenne = $somme/$nombre;
//echo($moyenne);
return $moyenne;

}

function moyenne_humidite($bdd,$id)
{
	$capteur_hum = read_hum($bdd,$_SESSION["id"]);
    $capteur_hum2 = $capteur_hum -> fetchAll();
    $nb_capteur = sizeof($capteur_hum2);
    $somme = 0;
    if($nb_capteur == 0)
    	{
    		return 'Aucune donnée';
    	}
    for ($i=0; $i < $nb_capteur; $i++)
    { 
    //echo($reponse[$i][0]);
    //echo('<br />');
        $donnees = recup_donnees($bdd,$capteur_hum2[$i][0]);
        $valeur = $donnees -> fetch();
        /*if($donnees -> rowcount() == 0)
            {
                echo('ya rien lol');
            }*/
        //echo($valeur[0]);
        //echo('<br />');
        $somme += $valeur[0];
        $nombre = $i+1;
	}

$moyenne = $somme/$nombre;
//echo($moyenne);
return $moyenne;

}