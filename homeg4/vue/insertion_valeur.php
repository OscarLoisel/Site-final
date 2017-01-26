<?php

$entete = entete();
$aside = aside("sav");
$contenu ='<form method="POST" action="">';
$contenu .='<label>';
$contenu .='Renseigner un numéro de tram';
$contenu .='</label>';
$contenu .='<input type="text" name="n_tram">';
$contenu .='<input type="submit" name="form_insert_valeur" value="Insérer">';
$contenu .= '</form>';

$pied = pied();

include('gabarit.php');
?>