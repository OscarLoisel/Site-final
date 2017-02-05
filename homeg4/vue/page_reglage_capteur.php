<?php
include_once("modele/affichage_reglage_capteur.php");

$moyenne_temp = moyenne_temperature($bdd,$_SESSION['id']);
$moyenne_hum = moyenne_humidite($bdd,$_SESSION['id']);
$nb_alarme = nombre_camera_allume($bdd,$_SESSION['id']);

$entete = entete("home");
$aside = aside("sav",$moyenne_temp,$moyenne_hum,$nb_alarme);
$contenu = '<h1>Réglages</h1>';
$contenu .= listecapteurs();

$reponse = affichage_table_capteur($bdd, $id_piece, $type);
while ($donnees = $reponse->fetch()) 
{
	$id_capteur = $donnees['id'];

	$req = affichage_table_donnees($bdd, $id_capteur);
	$data = $req->fetch();
	
	$contenu .= '<tr>';
	$contenu .= '<td>';
	$contenu .=	$donnees['n_tram']; // TABLE CAPTEUR 	
	$contenu .= '</td>';
	$contenu .= '<td>';
	$contenu .= $donnees['n_serie']; //TABLE CAPTEUR
	$contenu .= '</td>';
	$contenu .= '<td>';
	$contenu .= $data['valeur']; //TABLE DONNEES
	$contenu .= '</td>';
	/*$contenu .= '<td>';
	//$contenu .= $donnees['batterie']; //TABLE CAPTEUR
	$contenu .= '</td>';*/
	$contenu .= '<td>';
	$contenu .= $data['date_capteur']; //TABLE DONNEES
	$contenu .= '</td>';
	$contenu .= '<td>';

	if ($donnees['etat'] == 1) //TABLE CAPTEUR
	{
		$contenu .= '<img src="images/etat_vert.png">';
	}
	else
	{
		$contenu .= '<img src="images/etat_rouge.png">';
	}

	$contenu .='</td>';
	$contenu .='<td>';
	$contenu .='<a href="index.php?cible=supprimer_capteur&amp;id_piece='.$id_piece.'&amp;type='.$type.'&amp;delete='.$id_capteur.'"><img src="images/croix_supprimer.png"></a>';
	$contenu .='</td>';
	$contenu .='</tr>';
	
	
}
$contenu .='</table>';

// NOM_CAPTEURS - NUMERO DE SERIE - DONNEES DU CAPTEUR - BATTERIE DU CAPTEUR - VERT/ROUGE - SUPPRIMER

$pied = pied();

include('gabarit.php');
?>

