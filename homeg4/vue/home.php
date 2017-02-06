 <?php

    $moyenne_temp = round(moyenne_temperature($bdd,$_SESSION['id']),1);
    $moyenne_hum = round(moyenne_humidite($bdd,$_SESSION['id']),1);
    $nb_alarme = nombre_camera_allume($bdd,$_SESSION['id']);

    $entete = entete("home");
    $aside = aside("sav",$moyenne_temp,$moyenne_hum,$nb_alarme);
    $contenu = "<div id='grille_pieces'>";
    try 
    {
        $reponse = selectpiece($bdd, $_SESSION['id']);
        //while ($data = $reponse->fetch(); TRANSFORMER 
        $data = $reponse->fetchAll();
        $nbrligne = sizeof($data);
        for ($i= 0; $i < $nbrligne ; $i++) 
        {
            if($nbrligne != 0)
            {
                //echo($data[0][3]);
                $id = $data[$i][0];
                $contenu .= '<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=">';   
                $contenu .= '<div class="piece_grille">';
                    //$contenu .= '<div class="piece_grille">';
                        $contenu .= '<table>';
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<strong>'; 
                        $contenu .= $data[$i][1];
                        $contenu .= '</strong>';
                        //echo($data[0][3]);

                        $reponse_etat = verif_etat_capteurs($bdd, $id);
                        $data_etat = $reponse_etat -> fetchAll();
                        $size_etat = sizeof($data_etat);
                        //echo $size_etat;
                        $compteur = 0;
                        for ($j=0; $j < $size_etat; $j++) 
                        { 
                            $compteur += $data_etat[$j][0];
                        }
                        if ($compteur == $size_etat) 
                        {
                            $contenu .= '';
                        }
                        else
                        {
                            $contenu .= '<img src="images/warning.png">';
                        } 
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
                        //echo($i);
                    if($data[$i][3] == 'logo1')
                    {

                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<img src="images/salon.png" alt = "salon">';
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
                        
                    }
                    if($data[$i][3] == 'logo2')
                    {
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<img src="images/cuisine.png" alt = "cuisine">';
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
                        
                    }
                    if($data[$i][3] == 'logo3')
                    {
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<img src="images/Salle à manger.png" alt = "salle à manger">';
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
                        
                    }
                    if($data[$i][3] == 'logo4')
                    {
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<img src="images/toilettes.png" alt = "toilettes">';
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
                        
                    }
                    if($data[$i][3] == 'logo5')
                    {
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<img src="images/lit.png" alt = "lit">';
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
                        
                    }
                    if($data[$i][3] == 'logo6')
                    {
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<img src="images/chambre_enfant.png" alt = "chambre_enfant">';
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
                        
                    }
                    if($data[$i][3] == 'logo7')
                    {
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= '<img src="images/chambre_bebe.png" alt = "chambre_bebe">';
                        $contenu .= '</tr>';
                        $contenu .= '</td>';

                    }
                $contenu .= '</table>';
                $contenu .= '</div>';
                $contenu .= '</a>';
            }
                    
                

                     
        }
        $reponse->closeCursor();

    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    //$contenu .= '</div>';
    $contenu .= '<a href="index.php?cible=ajout_piece"';
    $contenu .= '<div class="piece_grille">';
    $contenu .= '<img src="images/croix.png" title="[imgcroix]">';
    $contenu .= '</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';
    
    $pied = pied();

    include 'gabarit.php';
?>