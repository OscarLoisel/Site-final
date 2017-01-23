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
		$reponse = $bdd -> prepare('SELECT * FROM pieces WHERE id_utilisateur = ? ORDER BY id DESC');
		$reponse -> execute(array($id_utilisateur));
		return $reponse;
	}


	function insertcapteur($bdd, $id_piece, $type, $n_serie)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(id_piece, type, n_serie) VALUES (?, ?, ?)');
		$reponse -> execute(array($id_piece, $type, $n_serie));
	}

	function insertcapteur2($bdd, $n_serie, $n_tram)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(n_serie, n_tram) VALUES (?, ?)');
		$reponse -> execute(array($n_serie, $n_tram));
		return $reponse;
	}

	function read_n_tram($bdd, $id_piece)
	{
		$reponse = $bdd-> prepare("SELECT n_tram WHERE id_piece = ? ORDER BY n_tram DESC LIMIT 0,1");
		$reponse-> execute(array($id_piece));
		return $reponse;
	}

?>
