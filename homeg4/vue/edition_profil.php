<?php
    include_once('Controleur/edition_profil.php');
    $entete = entete("edition_profil");
    $id = $_SESSION['id'];
    echo $id;
    $aside = asideReglage("edition_profil");
    $contenu = edition_profil();
    $pied = pied();

    include 'gabarit.php';

?>