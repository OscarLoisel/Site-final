<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenu = "<h1> Bienvenue sur le site d'Homeg4 !</h1>";
    $contenu .= '<h2> Veuillez renseigner vos identifiants et mot de passe.</h2> <br><br><br>';
    $contenu .= '<br>';
    $contenu .='<div id="msg_erreur"';
    $contenu .= $erreur;
    $contenu .='</div>';
    
    $pied = pied();

    include 'gabarit.php';
?>