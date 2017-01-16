<?php
    include('Controleur/edition_profil.php');
    $entete = entete("edition_profil");
    $id = $_SESSION['id'];
    echo $id;
    $aside = aside("sav");
    $contenu = edition_profil();
    $pied = pied();

    include 'gabarit.php';

?>