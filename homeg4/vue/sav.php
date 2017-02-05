<?php

    $entete = entete("sav");
    $aside = asideContact("sav");
    $contenu = '<div class="titre_bienvenue">';
    $contenu .= "<h1> Nous contactez: </h1>";
	$contenu .="<p> En cas de problème notre service après vente est à votre disposition. </p>";
	$contenu .="<p> Nous vous invitions cependant au préalable à consulter notre FAQ sur le forum.</p>";
	$contenu .="<p> Sinon, vous pouvez nous contactez sur facebook ou twitter </p>";
    $contenu .= '</div>';
    $pied = pied();

    include 'gabarit.php';
?>