<?php
	require("connexion_base.php");


	function checkCapteur($bdd, $n_serie)
	{
		$reponse = $bdd -> prepare('SELECT * FROM produit WHERE n_serie = ?');
		$reponse -> execute(array($n_serie));
		return $reponse;
	}

	function idNewPiece($bdd, $id_utilisateur)
	{
		$reponse = $bdd -> prepare('SELECT * FROM pieces WHERE id_utilisateur = ? ORDER BY DESC')
		$reponse -> execute(array($n_serie));
		return $reponse;
	}


	function insertcapteur($bdd, $id_piece, $type, $n_serie)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(id_piece, type, n_serie) VALUES (?, ?, ?)');
		$reponse -> execute(array($id_piece, $type, $n_serie));
		return $reponse;
	}

	function insertcapteur2($bdd, $n_serie)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(n_serie) VALUES (?)');
		$reponse -> execute(array($n_serie,));
		return $reponse;
	}

?>
