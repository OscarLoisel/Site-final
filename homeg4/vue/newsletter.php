<?php

    $entete = entete("Newsletter");
    $aside = asideContact("Newsletter");
    $contenu = '<div class="titre_bienvenue">';
    $contenu .= "<h1> NewsLetter 01/12/16 </h1>";
	$contenu .="<p> Bienvenue sur la première monture du nouveau site d'HOMEG4. </p>";
	$contenu .="<p>Ce site destiné à aider nos utilisateur à obtenir des informations sur leurs maisons connecté sera bientôt finalisé et disponible pour le plus grand monde.</p>";
	$contenu .="<p> Vous pourrez retrouver ici toutes les annonces de nos mises à jour du site et d'autres informations importantes. </p>";
	$contenu .="<p> Pour être sûr d'être mis au courant, vous pouvez vous vous inscrire à notre liste mail pour recevoir immédiatement sur votre adresse tous nos messages.</p>";
    $contenu .= '</div>';
    $pied = pied();

    include 'gabarit.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <form action="news_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="titre">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=homeg4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, titre, message FROM news ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>