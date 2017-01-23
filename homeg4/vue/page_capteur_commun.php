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
	$id_piece = $_GET['id_piece'];
		
	$reponse = affichagetypecapteurs($bdd, $id_piece);
		// Affiche les capteurs de la table capteur en fonction de l'id_piece récupéré via l'URL.
    	while ($data = $reponse->fetch())
    	{

            //VOLET

    		if($data['type'] == "volet")
    		{
                $type = $data['type'];
                $etat = $_GET['etat'];
                if ($etat == "true_volet") 
                {
                    $x=1;
                    if ( $x=0/*PROBLEME*/) 
                    {
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/volet.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_volet();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                    else
                    {
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/volet.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_volet();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>'; 
                    }
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_volet"><img src="images/volet_off.png" alt= "img_capteur"></a>';
                }
    			
    		}

            //LIGHT

            if($data['type'] == "light")
            {
                $type = $data['type'];
                $etat = $_GET['etat'];
                if ($etat == "true_light") 
                {
                    $x=1;
                    if ( $x=0/*PROBLEME*/) 
                    {
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/light.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_light();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                    else
                    {
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/light.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_light();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';  
                    }
                    
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_light"><img src="images/light_off.png" alt= "img_capteur"></a>';
                }
                
            }

            //TEMPÉRATURE

            if($data['type'] == "temperature")
            {
                $type = $data['type'];
                $etat = $_GET['etat'];
                if ($etat == "true_temperature") 
                {
                    $x=1;
                    if ( $x=0/*PROBLEME*/) 
                    {   
                        $contenu .='<img src="">';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/temperature.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_temperature();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                    else
                    {
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/temperature.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_temperature();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>'; 
                    }
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_temperature"><img src="images/temperature_off.png" alt= "img_capteur"></a>';
                }
                
            }

            //HUMIDITÉ

            if($data['type'] == "humidite")
            {
                $type = $data['type'];
                $etat = $_GET['etat'];
                if ($etat == "true_humidite") 
                {
                    $x=1;
                    if ( $x=0/*PROBLEME*/) 
                    {   
                        $contenu .='<img src="">';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/baro.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_humidite();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                    else
                    {
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/baro.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_humidite();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_humidite"><img src="images/baro_off.png" alt= "img_capteur"></a>';
                }
                
            }

            //PRÉSENCE

            if($data['type'] == "presence")
            {
                $type = $data['type'];
                $etat = $_GET['etat'];
                if ($etat == "true_presence") 
                {
                    $x=1;
                    if ( $x=0/*PROBLEME*/) 
                    {   
                        $contenu .='<img src="">';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/presence.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_presence();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                    else
                    {
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/presence.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_presence();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';  
                    }
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_presence"><img src="images/presence_off.png" alt= "img_capteur"></a>';
                }
                
            }

            // CAMÉRAS

            if($data['type'] == "cam")
            {
                $type = $data['type'];
                $etat = $_GET['etat'];
                if ($etat == "true_cam") 
                {
                    $x=1;
                    if ( $x=0/*PROBLEME*/) 
                    {   
                        $contenu .='<img src="">';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/cam.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_cam();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                    else
                    {
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/cam.png" alt= "img_capteur"></a>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_cam();
                        $contenu .='</div>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                    }
                }
                else
                {
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_cam"><img src="images/cam_off.png" alt= "img_capteur"></a>';
                }
                
            }

    		
    	}
	
	$contenu .="</div>";
	$pied = pied();

include("gabarit.php");

?>



