<?php

    $moyenne_temp = moyenne_temperature($bdd,$_SESSION['id']);
    $moyenne_hum = moyenne_humidite($bdd,$_SESSION['id']);
    $nb_alarme = nombre_camera_allume($bdd,$_SESSION['id']);

    $entete = entete("sav");
    $aside = aside("sav",$moyenne_temp,$moyenne_hum,$nb_alarme);
    $contenu = '<div class="titre_bienvenue">';
    $contenu .= "<h1> Nous contactez: </h1>";
	$contenu .="<p> En cas de problème notre service après vente est à votre disposition. </p>";
	$contenu .="<p> Nous vous invitions cependant au préalable à consulter notre FAQ sur le forum.</p>";
	$contenu .="<p> Sinon, vous pouvez nous contactez sur facebook ou twitter </p>";
	$contenu .="<p> Salaam! </p>";
    $contenu .= '</div>';
    $pied = pied();

    include 'gabarit.php';
?>