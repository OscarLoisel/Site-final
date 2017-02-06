<?php
	require("Controleur/reglages_generaux.php");


	$entete = entete("utilisateur");
	$aside = asideHorsConnexion();
	$contenu ='<div id="table_gestion">';
	$contenu .= '<div id="titre">';
	$contenu .= '<h1>Liste des salles</h1>';
	$contenu .= '</div>';
	$reponse = $bdd->prepare('SELECT piece FROM pieces WHERE id_utilisateur = ?');
	$reponse -> execute(array($_SESSION['id']));
	$contenu .='<table id="utilisateur_table">';
	while ($piece = $reponse ->fetch()) 
	{
		$contenu .='<tr>';
		$contenu .='<td>';
		$id_mbr = $piece[0];
		$contenu .= $piece[0];  
		$contenu .='</td>';
		/*if ($utilisateur['confirme'] == 0) 
		{
			$contenu .='<td>';	
			$contenu .= '<a href="index.php?cible=confirme&amp;confirme='.$id_mbr.'">Confirmer</a>';
			$contenu .='</td>';
		}
		else
		{
			$contenu .='<td>';
			$contenu .='</td>';
		}*/
		$contenu .='<td>';
		$contenu .= '<a href="index.php?cible=delete_piece&amp;delete_piece='.$id_mbr.'"> Supprimer</a>';
		$contenu .='</td>';
		$contenu .='</tr>';

	}
	$contenu .='</table>';
	$contenu .='</div>';
	$pied = pied();

	include'gabarit.php';
?>