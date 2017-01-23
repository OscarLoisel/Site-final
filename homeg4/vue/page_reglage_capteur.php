<?php
include_once("modele/affichage_reglage_capteur.php");
include_once("vue/commun.php");
$entete = entete("home");
$aside = aside("sav");
$contenu = '<h1>Réglages</h1>';

$reponse = affichage_table_capteur($bdd, $id_piece);
$donnees = $reponse->fetch();
$id_capteur = $donnees['id'];

echo $donnees['n_tram'];
echo $donnees['n_serie'];

$req = affichage_table_donnees($bdd, $id_capteur);
$data = $req->fetch();

$contenu .= listecapteurs();

// NOM_CAPTEURS - DONNEES DU CAPTEURS - BATTERIE DU CAPTEURS - VERT - ORANGE - ROUGE

$pied = pied();

include('gabarit.php');
?>
