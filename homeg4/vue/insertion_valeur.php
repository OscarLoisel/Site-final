<?php

$entete = entete("reglage");
$aside = asideReglage("securite");
$msg = "";
$contenu ='<form method="POST" action="">';
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