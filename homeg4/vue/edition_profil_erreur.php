<?php
	include_once('Controleur/edition_profil.php');
    $entete = entete("edition_profil");
    $aside = asideReglage("edition_profil");
    $contenu = edition_profil();
    $contenu .= $msg;
    $pied = pied();

    include 'gabarit.php';

?>