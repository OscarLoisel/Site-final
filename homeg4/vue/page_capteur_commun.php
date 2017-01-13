<?php
require("modele/affichagetypecapteurs_commun.php");
require("modele/affichagepiece.php");
include("modele/affichage_capteurs_specifiques.php");

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
	//echo $id_piece;
	//$id_piece == 54 ;
		
	$reponse = affichagetypecapteurs($bdd, $id_piece);
		// Affiche les capteurs de la table capteur en fonction de l'id_piece récupéré via l'URL.
    	while ($data = $reponse->fetch())
    	{	
    		if($data['type'] == "volet")
    		{
                $type = $data['type'];
    			$contenu .='<img src="images/volet.png" alt= "img_capteur">';
                
                $contenu = '<div id= "grille_capteur_specifique">';
                $reponse = affichagecapteursspecifiques($bdd, $id_piece, $type);
                while($data = $reponse -> fetch())
                {
                    $contenu .='<form method="POST" action="">';
                    $contenu .='<label>';
                    $contenu .=$data['capteur'];
                    $contenu .='</label>';
                    $contenu .='<input type="checkbox" name="">';
                    $contenu .='</form>';
                }
                $contenu .='</div>';

    		}
    		if($data['type'] == "light")
    		{
                $type = $data['type'];
    			$contenu .='<img src="images/light.png" alt= "img_capteur">';
                
                $contenu = '<div id= "grille_capteur_specifique">';
                $reponse = affichagecapteursspecifiques($bdd, $id_piece, $type);
                while($data = $reponse -> fetch())
                {
                    $contenu .='<form method="POST" action="">';
                    $contenu .='<label>';
                    $contenu .=$data['capteur'];
                    $contenu .='</label>';
                    $contenu .='<input type="checkbox" name="">';
                    $contenu .='</form>';
                }
                $contenu .='</div>';
    		}
    		if($data['type'] == "temperature")
    		{
    			$type = $data['type'];
    			$contenu .='<img src="images/temperature.png" alt= "img_capteur">';
                
                $contenu = '<div id= "grille_capteur_specifique">';
                $reponse = affichagecapteursspecifiques($bdd, $id_piece, $type);
                while($data = $reponse -> fetch())
                {
                    $contenu .='<form method="POST" action="">';
                    $contenu .='<label>';
                    $contenu .=$data['capteur'];
                    $contenu .='</label>';
                    $contenu .='<input type="checkbox" name="">';
                    $contenu .='</form>';
                }
                $contenu .='</div>';
  
    		}
    		if($data['type'] == "humidite")
    		{
            	$type = $data['type'];
    			$contenu .='<img src="images/baro.png" alt= "img_capteur">';

                $contenu = '<div id= "grille_capteur_specifique">';
                $reponse = affichagecapteursspecifiques($bdd, $id_piece, $type);
                while($data = $reponse -> fetch())
                {
                    $contenu .='<form method="POST" action="">';
                    $contenu .='<label>';
                    $contenu .=$data['capteur'];
                    $contenu .='</label>';
                    $contenu .='<input type="checkbox" name="">';
                    $contenu .='</form>';
                }
                $contenu .='</div>';
    		
    		}
    		if($data['type'] == "presence")
    		{
    			$type = $data['type'];
    			$contenu .='<img src="images/presence.png" alt= "img_capteur">';
                
                $contenu = '<div id= "grille_capteur_specifique">';
                
                $reponse = affichagecapteursspecifiques($bdd, $id_piece, $type);
                while($data = $reponse -> fetch())
                {
                    $contenu .='<form method="POST" action="">';
                    $contenu .='<label>';
                    $contenu .=$data['capteur'];
                    $contenu .='</label>';
                    $contenu .='<input type="checkbox" name="">';
                    $contenu .='</form>';
                }
                $contenu .='</div>';

    			
    		}
    		if($data['type'] == "cam")
    		{
    			$type = $data['type'];
    			$contenu .='<img src="images/cam.png" alt= "img_capteur">';

                $contenu = '<div id= "grille_capteur_specifique">';
                $reponse = affichagecapteursspecifiques($bdd, $id_piece, $type);
                while($data = $reponse -> fetch())
                {
                    $contenu .='<form method="POST" action="">';
                    $contenu .='<label>';
                    $contenu .=$data['capteur'];
                    $contenu .='</label>';
                    $contenu .='<input type="checkbox" name="">';
                    $contenu .='</form>';
                }
                $contenu .='</div>';
    			
    		}
    		
    	}
	
	$contenu .="</div>";
	$pied = pied();

include("gabarit.php");

?>



