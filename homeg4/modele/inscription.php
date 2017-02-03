<?php
	include_once("connexion_base.php");

	function reqmail($bdd, $mail)
		{
			$reponse= $bdd->prepare("SELECT * FROM utilisateur WHERE mail= ?");
		    $reponse->execute(array($mail));
		    return $reponse;
		}
	function read_n_serie($bdd, $n_serie)
		{
			$reponse= $bdd->prepare("SELECT n_serie FROM produit WHERE n_serie= ?");
			$reponse->execute(array($n_serie));
			return $reponse;
		}

	function insertutilisateur($bdd, $mail, $mdp)
		{
			$reponse = $bdd -> prepare('INSERT INTO utilisateur(mail, mdp) VALUES ( ?, ?)');
			$reponse -> execute(array($mail, $mdp));
		}
?>

