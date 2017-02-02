<?php
include_once('modele/update_lampe.php');

/*if (isset($_POST['rafraichir'])) 
{
	if (isset($_POST['onoffswitch'])) 
    {
    	
    	$reponse = read_lampe($bdd);
    	while ($data = $reponse-> fetch()) 
    	{
    		$id_capteur = $data['capteurs.id'];
    		
    		$reponse = update_lampe_on($bdd, $id_capteur);
    	}
    }
    else
    {
    	$reponse = read_lampe($bdd);
    	while ($data = $reponse-> fetch()) 
    	{
    		$id_capteur = $data['capteurs.id'];
    		
    		$reponse = update_lampe_off($bdd, $id_capteur);
    	}
    }
}*/
$msg='';
if (isset($_POST['formscenario'])) 
{
	$nom_scenario = htmlspecialchars($_POST['nom_scenario']);
	$date_debut = htmlspecialchars($_POST['date_debut']);
	$date_fin = htmlspecialchars($_POST['date_fin']);

	if (!empty($date_debut) AND !empty($date_fin) AND !empty($nom_scenario)) // DATE DE DEBUT ET DE FIN
	{
		echo $date_debut.'<br>';
		echo $date_fin.'<br>';

		if ($date_debut = $date_fin) 
		{
			
			if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
			{
				$choixh_d = $_POST['choixh_d'];
				$choixm_d = $_POST['choixm_d'];
				$choixh_f = $_POST['choixh_f'];
				$choixm_f = $_POST['choixm_f'];
				if ($choixh_d < $choixh_f) 
				{
					//insert dans la bdd
					echo $choixh_d.'H'.$choixm_d.'m<br>';
					echo $choixh_f.'H'.$choixm_f.'m<br>';
				}
				if ($choixh_d == $choixh_f AND $choixm_d <= $choixm_f) 
				{
					echo $choixh_d.'H'.$choixm_d.'m<br>';
					echo $choixh_f.'H'.$choixm_f.'m<br>';
				}
				else
				{
					$msg ="Veuillez renseigner une heure de début inférieur à l'heure de fin du scénario";
				}

			}
			else
			{
				$msg="Veuillez renseigner l'heure de début et de fin du scénario.";
			}
		}


		if ($date_debut < $date_fin) 
		{
			
			if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
			{
				$choixh_d = $_POST['choixh_d'];
				$choixm_d = $_POST['choixm_d'];
				$choixh_f = $_POST['choixh_f'];
				$choixm_f = $_POST['choixm_f'];
				
				//insert dans la bdd
				echo $choixh_d.'H'.$choixm_d.'m<br>';
				echo $choixh_f.'H'.$choixm_f.'m<br>';				

			}
			else
			{
				$msg="Veuillez renseigner l'heure de début et de fin du scénario.";
			}
		}

		if ($date_debut > $date_fin)
		{
			if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))
			{
				$msg = "La date de début du scénario doit être inférieur à la date de fin du scénario.";
			}
			
		}
		
	}
	else
	{
		$msg="Veuillez renseigner une date de début et de fin du scénario.";
	}
}
echo $msg;

?>