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