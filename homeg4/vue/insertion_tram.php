<?php
include_once("modele/insertion_tram.php");

$entete = enteteAdmin("insertion_tram");
$aside = asideHorsConnexion();
$msg = "";
$contenu ='<form method="POST" action="">';
$contenu .='<label for="deroulant_user">';
$contenu .='Choisir un utilisateur';
$contenu .='</label>';
$reponse = readutilisateurs($bdd);
$data = $reponse -> fetchAll();
$size_user = sizeof($data);
echo $size_user;
$contenu .='<select name="deroulant_user">';
for ($i=0; $i < $size_user; $i++) 
{
	$nom_utilisateur = $data[$i][3];
	$contenu .= '<option value="test">';
	$contenu .= $nom_utilisateur;
	$contenu .= '</option>';
}
$contenu .='</select><br><br>';
$contenu .='<label>';
$contenu .='Renseigner une tram';
$contenu .='</label>';
$contenu .='<input type="text" name="tram">';
$contenu .='<input type="submit" name="form_insert_valeur" value="Insérer">';
$contenu .= '</form>';
$contenu .= $msg;

$pied = pied();

include('gabarit.php');
?>