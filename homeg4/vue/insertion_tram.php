<?php
include_once("modele/insertion_tram.php");

$entete = entete("reglage");
$aside = asideReglage("securite");
$msg = "";
$contenu ='<form method="POST" action="">';
$contenu .='<label>';
$contenu .='Choisir un utilisateur';
$contenu .='</label>';
$reponse = readutilisateur();
$contenu .='<select name="deroulant_user" size="'.$size_user.'"';
$contenu .= '<option>'.$nom_utilisateur;
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