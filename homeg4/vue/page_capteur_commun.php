<?php
include_once("modele/affichagetypecapteurs_commun.php");
include_once("modele/affichagepiece.php");
include_once("controleur/update_chauffage_commun.php");
include_once("controleur/update_volet_commun.php");
include_once("controleur/update_light_commun.php");

    $moyenne_temp = round(moyenne_temperature($bdd,$_SESSION['id']),1);
    $moyenne_hum = round(moyenne_humidite($bdd,$_SESSION['id']),1);
    $nb_alarme = nombre_camera_allume($bdd,$_SESSION['id']);

    $id_utilisateur = $_SESSION['id'];
    $entete = entete("home");
    $aside = aside("sav",$moyenne_temp,$moyenne_hum,$nb_alarme);

    $reponse = affichagepiece($bdd, $id_piece);
    $donnee = $reponse -> fetch();

    $contenu = '<div id = sous_contenu>';
    $contenu .='<div id = nom_piece>';
    $contenu .= '<h1>';
    $contenu .= $donnee['piece'];
    $contenu .= '</h1>';
    $contenu .='</div>';
    $contenu .='<br />';
    $contenu .= "<div id='grille_capteurs'>";
    $id_piece = $_GET['id_piece'];
    /*$contenu .= '<br />';
    $contenu .= '<br />';
    $contenu .= '<br />';*/
    $contenu .='<table>';
    $contenu .='<tr>';
    $liste = [];
    $liste_piece = [];

        
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
                        /*$contenu .= '<td>';
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/volet.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_volet();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                    else
                    {
                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/volet.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $liste[] = 'true_volet';
                        

                        /*//$contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_volet();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                }
                else
                {
                    $contenu .= '<td>';
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_volet"><img src="images/volet_off.png" alt= "img_capteur"></a>';
                    $contenu .= '</td>';
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
                        /*$contenu .= '<td>';
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/light.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_light();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                    else
                    {
                       $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/light.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $liste[] = 'true_light';
                        /*$contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_light();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>'; */
                    }
                    
                }
                else
                {
                    $contenu .= '<td>';
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_light"><img src="images/light_off.png" alt= "img_capteur"></a>';
                    $contenu .= '</td>';
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
                        /*$contenu .= '<td>';
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/temperature.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_temperature();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                    else
                    {
                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/temperature.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $liste[] = 'true_temperature';
                        /*$contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_temperature();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                }
                else
                {
                    $contenu .= '<td>';
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_temperature"><img src="images/temperature_off.png" alt= "img_capteur"></a>';
                    $contenu .= '</td>';
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
                        /*$contenu .= '<td>';
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/baro.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_humidite();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                    else
                    {
                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/baro.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $liste[] = 'true_humidite';
                        /*$contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_humidite();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                }
                else
                {
                    $contenu .= '<td>';
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_humidite"><img src="images/baro_off.png" alt= "img_capteur"></a>';
                    $contenu .= '</td>';
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
                        /*$contenu .= '<td>';
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/presence.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        /*$contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_presence();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                    else
                    {
                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/presence.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $liste[] = 'true_presence';
                        /*$contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_presence();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>'; */ 
                    }
                }
                else
                {
                    $contenu .= '<td>';
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_presence"><img src="images/presence_off.png" alt= "img_capteur"></a>';
                    $contenu .= '</td>';
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
                        /*$contenu .= '<td>';
                        $contenu .='<img src="">'; // IMAGE PROBLEME
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/cam.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_cam();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                    else
                    {
                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat="><img src="images/cam.png" alt= "img_capteur"></a>';
                        $contenu .= '</td>';
                        $liste[] = 'true_cam';
                        /*$contenu .= '</tr>';

                        $contenu .= '<tr>';

                        $contenu .= '<td>';
                        $contenu .='<div class=console_reglage>';
                        $contenu .=console_cam();
                        $contenu .='</div>';
                        $contenu .= '</td>';

                        $contenu .= '<td>';
                        $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                        $contenu .='<img src="images/reglage.png">';
                        $contenu .='</a>';
                        $contenu .= '</td>';
                        $contenu .= '</tr>';*/
                    }
                }
                else
                {
                    $contenu .= '<td>';
                    $contenu .='<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=true_cam"><img src="images/cam_off.png" alt= "img_capteur"></a>';
                    $contenu .= '</td>';
                }
                
            }       
        }
        $contenu .= '<td>';
        $contenu .= '<a href = "index.php?cible=page_capteur_commun&amp;id_piece='.$id_piece.'&amp;etat=capteur"> <img src = "images/round_add_button.png"></a>';
        $contenu .= '</tr>';
        $contenu .='</table>';
        $contenu .='<br />';
        $contenu .='<table>';

        



        $longueur = sizeof($liste);
        for ($i=0; $i < $longueur ; $i++)
        { 
            if ($liste[$i] == 'true_volet')
            {
                $type= 'volet';
                $contenu .='<tr>';
                $contenu .= '<td>';
                $contenu .='<div class=console_reglage>';
                $contenu .=console_volet();
                $contenu .='</div>';
                $contenu .= '</td>';

                $contenu .= '<td>';
                $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                $contenu .='<img src="images/reglage.png">';
                $contenu .='</a>';
                $contenu .='</td>';
                $contenu .='</tr>';

            }

            elseif ($liste[$i] == 'true_light')
            {
                $type= 'light';
                $contenu .= '<tr>';
                $contenu .= '<td>';
                $contenu .='<div class=console_reglage>';
                $contenu .=console_light();
                $contenu .='</div>';
                $contenu .= '</td>';

                $contenu .= '<td>';
                $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                $contenu .='<img src="images/reglage.png">';
                $contenu .='</a>';
                $contenu .= '</td>';
                $contenu .= '</tr>'; 
            }

            elseif ($liste[$i] == 'true_temperature')
            {
                $id_piece = $_GET['id_piece'];
                $type= 'temperature';
                $contenu .= '<tr>';
                $contenu .= '<td>';
                $contenu .='<div class=console_reglage>';
                $reponse = recup_last_valeur_schroll($bdd, $id_piece, $id_utilisateur);
                $data = $reponse -> fetch();
                //echo($data[0]).'<br>';
                //echo($id_utilisateur).'<br>';
                //echo $id_piece.'<br>';
                if ($data[0]!='')
                {
                    $contenu .=console_temperature($data[0]).'<br>';
                }
                else
                {
                    $contenu .= console_temperature(20).'<br>';
                }
                $contenu .='</div>';
                $contenu .= '</td>';

                $contenu .= '<td>';
                $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                $contenu .='<img src="images/reglage.png">';
                $contenu .='</a>';
                $contenu .= '</td>';
                $contenu .= '</tr>';
            }

            elseif ($liste[$i] == 'true_humidite')
            {
                $type= 'humidite';
                $contenu .= '<tr>';
                $contenu .= '<td>';
                $contenu .='<div class=console_reglage>';
                $contenu .=console_humidite();
                $contenu .='</div>';
                $contenu .= '</td>';

                $contenu .= '<td>';
                $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                $contenu .='<img src="images/reglage.png">';
                $contenu .='</a>';
                $contenu .= '</td>';
                $contenu .= '</tr>';
            }

            elseif ($liste[$i] == 'true_presence')
            {
                $type = 'presence';
                $contenu .= '<tr>';
                $contenu .= '<td>';
                $contenu .='<div class=console_reglage>';
                $contenu .=console_presence();
                $contenu .='</div>';
                $contenu .= '</td>';

                $contenu .= '<td>';
                $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                $contenu .='<img src="images/reglage.png">';
                $contenu .='</a>';
                $contenu .= '</td>';
                $contenu .= '</tr>';
            }

            elseif ($liste[$i] == 'true_cam')
            {
                $type= 'cam';
                $contenu .= '<tr>';
                $contenu .= '<td>';
                $contenu .='<div class=console_reglage>';
                $contenu .=console_cam();
                $contenu .='</div>';
                $contenu .= '</td>';

                $contenu .= '<td>';
                $contenu .='<a href="index.php?cible=reglage_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'">';
                $contenu .='<img src="images/reglage.png">';
                $contenu .='</a>';
                $contenu .= '</td>';
                $contenu .= '</tr>';
            }

        }


    
    $contenu .="</div>";
    $contenu .='</div>';
    //$contenu .='</tr>';
    $contenu .="</table>";
    $contenu .='</div>';
    $contenu .='</div>';
    $pied = pied();

include("gabarit.php");

?>



