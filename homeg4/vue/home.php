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
                $contenu .= '<a href="index.php?cible=page_capteur_commun&amp;id_piece='.$id.'&amp;etat=" >';   
                $contenu .= '<div class="piece_grille">';
                    //$contenu .= '<div class="piece_grille">';
                    ?>
                        <strong><?php $contenu .= $data[$i][1]; ?></strong>
                    <?php
                    if($data[$i][3] == 'logo1')
                    {
                        $contenu .= '<br />';
                        $contenu .= '<img src="images/salon.png" alt = "salon">';
                    }
                    if($data[$i][3] == 'logo2')
                    {
                        $contenu .= '<br />';
                        $contenu .= '<img src="images/cuisine.png" alt = "cuisine">';
                    }
                    if($data[$i][3] == 'logo3')
                    {
                        $contenu .= '<br />';
                        $contenu .= '<img src="images/Salle à manger.png" alt = "salle à manger">';
                    }
                    if($data[$i][3] == 'logo4')
                    {
                        $contenu .= '<br />';
                        $contenu .= '<img src="images/toilettes.png" alt = "toilettes">';
                    }
                    if($data[$i][3] == 'logo5')
                    {
                        $contenu .= '<br />';
                        $contenu .= '<img src="images/lit.png" alt = "lit">';
                    }
                    if($data[$i][3] == 'logo6')
                    {
                        $contenu .= '<br />';
                        $contenu .= '<img src="images/chambre_enfant.png" alt = "chambre_enfant">';
                    }
                    if($data[$i][3] == 'logo7')
                    {
                        $contenu .= '<br />';
                        $contenu .= '<img src="images/chambre_bebe.png" alt = "chambre_bebe">';
                    }
                $contenu .= '</div>';
                $contenu .= '</a>';
                    
                

                $id++;     
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
    
    $pied = pied();

    include 'gabarit.php';
?>