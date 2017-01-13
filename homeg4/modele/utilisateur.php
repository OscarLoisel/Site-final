<?php
	require("connexion_base.php");

	function connect($bdd, $mail, $mdp)
	{
		$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = ? AND mdp= ?'); 
		$reponse -> execute(array($mail, $mdp));
		return $reponse;
	}

	function readconnexion ($bdd, $mail)
	{
		$reponse = $bdd -> prepare("SELECT connexion FROM utilisateur WHERE mail = ? ");
		$reponse -> execute(array($mail));
		return $reponse;
	}
?>




