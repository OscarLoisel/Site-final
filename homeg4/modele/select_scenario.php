<?php
	require("connexion_base.php");

	function select_scenario($bdd, $id)
		{
			$reponse= $bdd->prepare("SELECT * FROM scenarios WHERE id_utilisateur = ?");
		    $reponse->execute(array($id));
		    return $reponse;
		}

	function get_etat($bdd,$id_scenario)
		{
			$etat = $bdd -> prepare("SELECT etat FROM scenarios WHERE id_scenario = ?");
			$etat -> execute(array($_GET['id_scenario']));
			return $etat;
		}	



		if(isset($_GET['id_scenario']) AND !empty($_GET['id_scenario']))
		{
			$etat = get_etat($bdd,$_GET['id_scenario']);
			$reponse = $etat -> fetch();

			if($reponse[0] == 1)
			{
				$reponse = $bdd-> prepare('UPDATE scenarios SET etat = 0 WHERE id_scenario = ?');
				$reponse-> execute(array($_GET['id_scenario']));
			}
			else
			{
				$reponse = $bdd-> prepare('UPDATE scenarios SET etat = 1 WHERE id_scenario = ?');
				$reponse-> execute(array($_GET['id_scenario']));
			}


			


			/*$update = (int) $_GET['id_scenario'];

			$reponse = $bdd-> prepare('UPDATE etat SET etat FROM scenarios WHERE id_scenario = ?');
			$reponse-> execute(array($update));*/
		}
?>