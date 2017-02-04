<?php

function moyenne_temperature($bdd,$id)
{
	$capteur_temp = read_temp($bdd,$_SESSION["id"]);
    $capteur_temp2 = $capteur_temp -> fetchAll();
    $nb_capteur = sizeof($capteur_temp2);
    $somme = 0;
    $nombre = 1;
    if($nb_capteur == 0)
    	{
    		return '--';
    	}
    for ($i=0; $i < $nb_capteur; $i++)
    {
    //echo($reponse[$i][0]);
    //echo('<br />');
        $donnees = recup_donnees($bdd,$capteur_temp2[$i][0]);
        $valeur = $donnees -> fetch();
        if($valeur == '')
        {

        }
        /*if($donnees -> rowcount() == 0)
            {
                echo('ya rien lol');
            }*/
        //echo($valeur[0]);
        //echo('<br />');
        else
        {
        	$somme += $valeur[0];
        	$nombre = $i + 1;
        }
        
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
    $nombre = 1;
    if($nb_capteur == 0)
    	{
    		return '--';
    	}
    for ($i=0; $i < $nb_capteur; $i++)
    { 
    //echo($reponse[$i][0]);
    //echo('<br />');
        $donnees = recup_donnees($bdd,$capteur_hum2[$i][0]);
        $valeur = $donnees -> fetch();
        if($valeur[0] == '')
        {

        }
        else
        {
        	$somme += $valeur[0];
        	$nombre = $i+1;
        	echo'en revoir';
        }
        /*if($donnees -> rowcount() == 0)
            {
                echo('ya rien lol');
            }*/
        //echo($valeur[0]);
        //echo('<br />');
        
	}

$moyenne = $somme/$nombre;
//echo($moyenne);
return $moyenne;

}


function nombre_camera_allume($bdd,$id)
{
	$capteur_light = read_light($bdd,$_SESSION["id"]);
    $capteur_light2 = $capteur_light -> fetchAll();
    $nb_capteur = sizeof($capteur_light2);
    if($nb_capteur == 0)
    {
    	return '--';
    }
    $somme = 0;
    for ($i=0; $i < $nb_capteur; $i++)
    { 
    	$donnees= recup_donnees($bdd,$capteur_light2[$i][0]);
    	$valeur = $donnees -> fetch();
    	$somme += $valeur;
    }
    if($somme == 1 OR $somme == 0)
    {
    	return $somme.' / '.$nb_capteur; 	
    }
    else
    {
    	return $somme.' / '.$nb_capteur;
    }

}