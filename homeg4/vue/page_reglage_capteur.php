<?php
include_once("modele/affichage_reglage_capteur.php");

$entete = entete("home");
$aside = aside("sav");
$contenu = '<h1>Réglages</h1>';

$reponse = affichage_table_capteur($bdd, $id_piece);
$donnees = $reponse->fetch();
$id_capteur = $donnees['id'];

echo $donnees['n_tram'];
echo $donnees['n_serie'];

$req = affichage_table_donnees($bdd, $id_capteur);
$data = $req->fetch();

/*$contenu .= listecapteurs();
$contenu .='<tr>';
$contenu .='<td>';
$contenu .=	$donnees['n_tram']; // TABLE CAPTEUR 	
$contenu .='</td>';
$contenu .='<td>';
$contenu .= $donnees['n_serie']; //TABLE CAPTEUR
$contenu .='</td>';
$contenu .='<td>';
$contenu .= $data['valeur']; //TABLE DONNEES
$contenu .='</td>';
$contenu .='<td>';
$contenu .= $donnees['batterie']; //TABLE CAPTEUR
$contenu .='</td>';
$contenu .='<td>';
$contenu .= $data['date']; //TABLE DONNEES
$contenu .='</td>';
$contenu .='<td>';

if ($donnees['etat'] == 1) //TABLE CAPTEUR
{
	 $contenu .= "vert";
}
else
{
	$contenu .= "rouge";
}

$contenu .='</td>';
$contenu .='</table>';
$contenu .=
$contenu .=
$contenu .=
$contenu .=
$contenu .=
$contenu .=
$contenu .=
$contenu .=
$contenu .= */

// NOM_CAPTEURS - DONNEES DU CAPTEURS - BATTERIE DU CAPTEURS - VERT - ORANGE - ROUGE

$pied = pied();

include('gabarit.php');
?>

