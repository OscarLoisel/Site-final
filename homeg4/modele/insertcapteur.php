<?php
	require("connexion_base.php");


	function checkCapteur($bdd, $n_serie)
	{
		$reponse = $bdd -> prepare('SELECT * FROM produit WHERE n_serie = ? AND etat = 0');
		$reponse -> execute(array($n_serie));
		return $reponse;
	}

	function idNewPiece($bdd, $id_utilisateur)
	{
		$reponse = $bdd -> prepare('SELECT * FROM pieces WHERE id_utilisateur = ? ORDER BY id DESC');
		$reponse -> execute(array($id_utilisateur));
		return $reponse;
	}


	function insertcapteur($bdd, $id_piece, $type, $n_serie, $n_tram)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(id_piece, type, n_serie, n_tram) VALUES (?, ?, ?, ?)');
		$reponse -> execute(array($id_piece, $type, $n_serie,$n_tram));
	}

	function insertcapteur2($bdd, $n_serie, $n_tram)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(n_serie, n_tram) VALUES (?, ?)');
		$reponse -> execute(array($n_serie, $n_tram));
		return $reponse;
	}

	function read_n_tram($bdd, $id_utilisateur)
	{
		$reponse = $bdd-> prepare("SELECT capteurs.n_tram FROM capteurs,pieces WHERE pieces.id_utilisateur = ? ORDER BY capteurs.n_tram DESC LIMIT 1");
		$reponse-> execute(array($id_utilisateur));
		return $reponse;
	}

?>
