<?php
require("modele/affichagetypecapteurs_commun.php");
require("modele/affichagepiece.php");


	$entete = entete("home");
	$aside = aside("sav");

	$reponse = affichagepiece($bdd, $id_piece);
	$donnee = $reponse -> fetch();

	$contenu ='<div id = nom_piece>';
	$contenu .= '<h1>';
	$contenu .= $donnee['piece'];
	$contenu .= '</h1>';
	$contenu .='</div>';
	$contenu .= "<div id='grille_capteurs'>";
	$id = $_GET['id_piece'];
		
	$reponse = affichagetypecapteurs($bdd, $id_piece);
		// Affiche les capteurs de la table capteur en fonction de l'id_piece récupéré via l'URL.
    	while ($data = $reponse->fetch())
    	{

            //VOLET

    		if($data['type'] == "volet")
    		{
                $etat = $_GET['etat'];
                if ($etat == "true_volet") 
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat="><img src="images/volet.png" alt= "img_capteur"></a>';
                    $contenu .='<div class=console_reglage>';
                    $contenu .=console_volet();
                    $contenu .='</div>';
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=true_volet"><img src="images/volet_off.png" alt= "img_capteur"></a>';
                }
    			
    		}

            //LIGHT

            if($data['type'] == "light")
            {
                $etat = $_GET['etat'];
                if ($etat == "true_light") 
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat="><img src="images/light.png" alt= "img_capteur"></a>';
                    $contenu .='<div class=console_reglage>';
                    $contenu .=console_light();
                    $contenu .='</div>';
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=true_light"><img src="images/light_off.png" alt= "img_capteur"></a>';
                }
                
            }

            //TEMPÉRATURE

            if($data['type'] == "temperature")
            {
                $etat = $_GET['etat'];
                if ($etat == "true_temperature") 
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat="><img src="images/temperature.png" alt= "img_capteur"></a>';
                    $contenu .='<div class=console_reglage>';
                    $contenu .=console_temperature();
                    $contenu .='</div>';
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=true_temperature"><img src="images/temperature_off.png" alt= "img_capteur"></a>';
                }
                
            }

            //HUMIDITÉ

            if($data['type'] == "humidite")
            {
                $etat = $_GET['etat'];
                if ($etat == "true_humidite") 
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat="><img src="images/baro.png" alt= "img_capteur"></a>';
                    $contenu .='<div class=console_reglage>';
                    $contenu .=console_humidite();
                    $contenu .='</div>';
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=true_humidite"><img src="images/baro_off.png" alt= "img_capteur"></a>';
                }
                
            }

            //PRÉSENCE

            if($data['type'] == "presence")
            {
                $etat = $_GET['etat'];
                if ($etat == "true_presence") 
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat="><img src="images/presence.png" alt= "img_capteur"></a>';
                    $contenu .='<div class=console_reglage>';
                    $contenu .=console_presence();
                    $contenu .='</div>';
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=true_presence"><img src="images/presence_off.png" alt= "img_capteur"></a>';
                }
                
            }

            // CAMÉRAS

            if($data['type'] == "cam")
            {
                $etat = $_GET['etat'];
                if ($etat == "true_cam") 
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat="><img src="images/cam.png" alt= "img_capteur"></a>';
                    $contenu .='<div class=console_reglage>';
                    $contenu .=console_cam();
                    $contenu .='</div>';
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=true_cam"><img src="images/cam_off.png" alt= "img_capteur"></a>';
                }
                
            }

    		
    	}
	
	$contenu .="</div>";
	$pied = pied();

include("gabarit.php");

?>



