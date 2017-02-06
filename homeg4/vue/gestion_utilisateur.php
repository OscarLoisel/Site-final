<?php
	require("controleur/gestion_utilisateur.php");

	$reponse = nbr_utilisateur($bdd);
	$nbr_utilisateur = sizeof($reponse);
	echo $nbr_utilisateur;

	$entete = enteteAdmin("utilisateur");
	$aside = asideAdmin2($nbr_utilisateur);
	$contenu ='<div id="table_gestion">';
	$contenu .= '<div id="titre">';
	$contenu .= '<h1>Gestion des membres</h1>';
	$contenu .= '</div>';
	$reponse = $bdd->query('SELECT * FROM utilisateur ORDER BY id ');
	$contenu .='<table id="utilisateur_table">';
	while ($utilisateur = $reponse ->fetch()) 
	{
		$contenu .='<tr>';
		$contenu .='<td>';
		$id_mbr = $utilisateur['id'];
		$mail = $utilisateur['mail'];
		$contenu .= $utilisateur['id'];  
		$contenu .='</td>';
		$contenu .='<td>';
		$contenu .= '<a href="index.php?cible=info_utilisateur&amp;id_membre='.$id_mbr.'">'.$mail.'<a>';
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
		$contenu .= '<a href="index.php?cible=delete&amp;delete='.$id_mbr.'"> <img src="images/delete.png"></a>';
		$contenu .='</td>';
		$contenu .='</tr>';

	}
	$contenu .='</table>';
	$contenu .='</div>';
	$pied = pied();

	include'gabarit.php';
?>