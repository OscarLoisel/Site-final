<?php
	require("controleur/gestion_utilisateur.php");

	$reponse = nbr_utilisateur($bdd);
	$data = $reponse->fetchAll();
	$nbr_utilisateur = sizeof($data);

	$entete = enteteAdmin("utilisateur");
	$aside = asideAdmin2($nbr_utilisateur);
	$contenu ='<div id="table_gestion">';
	$contenu .= '<div id="titre">';
	$contenu .= '<h1>Gestion des membres</h1>';
	$contenu .= '</div>';
	$reponse = $bdd->query('SELECT * FROM utilisateur ORDER BY id ');
	$contenu .='<table class="utilisateur_table">';
	while ($utilisateur = $reponse ->fetch()) 
	{
		$id_mbr = $utilisateur['id'];
		$mail = $utilisateur['mail'];
		
		if ($id_mbr != 7) 
		{
			$contenu .='<tr>';
			$contenu .='<td>';
			$contenu .= $id_mbr;  
			$contenu .='</td>';
			$contenu .='<td>';
			$contenu .= '<a href="index.php?cible=info_utilisateur&amp;id_membre='.$id_mbr.'">'.$mail.'<a>';
			$contenu .='</td>';
		
			$contenu .='<td>';
			$contenu .= '<a href="index.php?cible=delete&amp;delete='.$id_mbr.'"> <img src="images/delete.png"></a>';
			$contenu .='</td>';
			$contenu .='</tr>';
		}
		else
		{
			$contenu .='<tr>';
			$contenu .='<td>';
			$contenu .= $id_mbr;  
			$contenu .='</td>';
			$contenu .='<td>';
			$contenu .= $mail;
			$contenu .='</td>';
		
			$contenu .='<td>';
			$contenu .='ADMIN';
			$contenu .='</td>';
			$contenu .='</tr>';
		}
	

	}
	$contenu .='</table>';
	$contenu .='</div>';
	$pied = pied();

	include'gabarit.php';
?>