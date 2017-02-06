<?php

    $entete = entete("Newsletter");
    $aside = asideContact("Newsletter");
    $contenu = '<div id="form_newsletter">';
    $contenu .= '</div>';
   
	
	$reponse = $bdd->query('SELECT titre, message FROM news ORDER BY ID DESC LIMIT 0, 10');

	
	$contenu .='<div id= "contenu_message">';
	while ($donnees = $reponse->fetch())
	{
		
		$contenu .= '<div class="police_titre">';
		$contenu .= $donnees['titre'];
		$contenu .= '</div>';
		$contenu .= '<div class="small_police">';
		$contenu .= $donnees['message'];
		$contenu .= '</div>';
	}
	$contenu .= '</div>';

	$reponse->closeCursor();
	$contenu .= '</div>';

	$pied = pied();

    include 'gabarit.php';


?>
