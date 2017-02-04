 <?php

    $moyenne_temp = moyenne_temperature($bdd,$_SESSION['id']);
    $moyenne_hum = moyenne_humidite($bdd,$_SESSION['id']);
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
        $id = $data[0][0];
        for ($i= 0; $i < $nbrligne ; $i++) 
        {
                $id = $data[$i][0];
                $contenu .= '<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=">';   
                $contenu .= '<div class="piece_grille">';
                    //$contenu .= '<div class="piece_grille">';
                        $contenu .= '<table>';
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                    ?>
                        <strong><?php $contenu .= $data[$i][1]; ?></strong>
                    <?php
                        $contenu .= '</tr>';
                        $contenu .= '</td>';
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