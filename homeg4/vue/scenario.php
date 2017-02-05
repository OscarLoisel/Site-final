<?php


$entete = entete("scenario");
//$aside = asideReglage("edition_profil");
$aside = asideReglage("scenarios");

$contenu = "<div id='grille_scenario'>";
try 
    {
        $reponse = select_scenario($bdd, $_SESSION['id']);
        //while ($data = $reponse->fetch(); TRANSFORMER 
        $data = $reponse->fetchAll();
        $nbrligne = sizeof($data);
        for ($i= 0; $i < $nbrligne ; $i++) 
        {
            if($nbrligne != 0)
            {
            	$contenu .= '<a href="index.php?cible=scenario&amp;id_scenario='.$data[$i][0].'">';   
                $contenu .= '<div class="piece_scenario">';
                    //$contenu .= '<div class="piece_grille">';
                        $contenu .= '<table>';
                        $contenu .= '<tr>';
                        $contenu .= '<td colspan = "3">';
                    ?>
                        <strong><?php $contenu .= $data[$i][1]; ?></strong>
                    <?php
                        $contenu .= '</td>';
                        $contenu .= '</tr>';
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= 'Date de début :';
                        $contenu .= '<br />';
                        ?>
                        <p><?php $contenu .= $data[$i][2]; ?></p>
                    <?php
                        $contenu .= '</td>';
                        $contenu .= '<td>';
                        $contenu .= 'Date de fin :';
                        $contenu .= '<br />';
                        ?>
                        <p><?php $contenu .= $data[$i][3]; ?></p>
                    <?php

                    	$contenu .= '</td>';
                        $contenu .= '<td>';
                        if($data[$i][8]== 1)
                        {
                        	$contenu .= '<img src = "images/icone_vert_scenario.png">';
                        }
                        else
                        {
                        	$contenu .= '<img src ="images/icone_rouge_scenario.png">';
                        }
                    	$contenu .= '</td>';
                        $contenu .= '</tr>';
                        $contenu .= '<tr>';
                        $contenu .= '<td>';
                        $contenu .= 'Valeur :'
                        ?>
                        <p><?php $contenu .= $data[$i][6]; ?></p>
                    <?php
                    	$contenu .= '</td>';
                    	$contenu .= '<td>';
                    	$contenu .= 'Scenario : '
                    	?>
                        <p><?php $contenu .= $data[$i][7]; ?></p>
                    <?php
                    	$contenu .= '</td>';
                    	$contenu .= '<td>';


            }
            $contenu .= '</table>';
            $contenu .= '</div>';
        }
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

$contenu .= '</div>';





$pied = pied();

include('gabarit.php');

?>