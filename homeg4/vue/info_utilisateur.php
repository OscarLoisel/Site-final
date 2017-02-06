<?php
	include_once("modele/info_utilisateur.php");

	$reponse = nbr_utilisateur($bdd);
	$data = $reponse->fetchAll();
	$nbr_utilisateur = sizeof($data);

	$entete = enteteAdmin("utilisateur");
	$aside = asideAdmin2($nbr_utilisateur);

	$contenu = '<div id= table_info>';
	
	
	$id_utilisateur = $_GET['id_membre'];
	//echo $id_utilisateur;
	$reponse = read_info_utilisateur($bdd, $id_utilisateur);
	$size_info = sizeof($reponse);
	//echo $size_info;
	if ($size_info == 0) 
	{
		$contenu .= "Cet utilisateur  n'a pas de capteurs !";
	}
	else
	{
		$contenu = '<h1>Informations de l\'utilisateur : <h1>';
		$contenu .= '<table id = "info_utilisateur">';
		while($data = $reponse->fetch())
		{
			$contenu .= '<tr>';

			$contenu .= '<td>';
			$contenu .= $data['id'];
			$contenu .= '</td>';

			$contenu .= '<td>';
			$contenu .= $data['id_piece'];
			$contenu .= '</td>';


			$contenu .= '<td>';
			$contenu .= $data['type'];
			$contenu .= '</td>';

			$contenu .= '<td>';
			$contenu .= $data['etat'];
			$contenu .= '</td>';

			$contenu .= '<td>';
			$contenu .= $data['n_serie'];
			$contenu .= '</td>';

			$contenu .= '</tr>';
		}

		$contenu .= '</table>';
		$contenu .= '<div>';
	}

$pied = pied();

include'gabarit.php';
?>