<?php
	require("connexion_base.php");

	function reqmail($bdd, $mail)
		{
			$reponse= $bdd->prepare("SELECT * FROM utilisateur WHERE mail= ?");
		    $reponse->execute(array($mail));
		    return $reponse;
		}
	function read_n_serie($bdd, $n_serie)
		{
			$reponse= $bdd->prepare("SELECT n_serie FROM capteurs WHERE n_serie= ?");
			$reponse->execute(array($n_serie));
			return $reponse;
		}

	function read_n_tram($bdd, $id_piece)
		{
			$reponse = $bdd-> prepare("SELECT n_tram WHERE id_piece = ? ORDER BY n_tram LIMIT 0,1");
			$reponse-> execute(array($id_piece));
			return $reponse;
		}

	function insertutilisateur($bdd, $mail, $mdp)
		{
			$reponse = $bdd -> prepare('INSERT INTO utilisateur(mail, mdp) VALUES ( ?, ?)');
			$reponse -> execute(array($mail, $mdp));
		}
?>

