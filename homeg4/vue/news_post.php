<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=homeg4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO news (pseudo, titre, message) VALUES(?, ?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['titre'], $_POST['message']));
header('Location: newsletter.php');
?>