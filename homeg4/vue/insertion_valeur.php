<?php

$entete = entete();
$aside = aside("sav");
$contenu ='<form method="POST" action="">';
$contenu .='<label>';
$contenu .='Renseigner une tram';
$contenu .='</label>';
$contenu .='<input type="text" name="tram">';
$contenu .='<input type="submit" name="form_insert_valeur" value="Insérer">';
$contenu .= '</form>';

$pied = pied();

include('gabarit.php');
?>