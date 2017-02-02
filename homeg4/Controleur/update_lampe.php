<?php
/*include_once('modele/update_lampe.php');

if (isset($_POST['rafraichir'])) 
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
if (isset($_POST['formscenario'])) 
{
	$date_debut = htmlspecialchars($_POST['date_debut']);
	$date_fin = htmlspecialchars($_POST['date_fin']);
	if (!empty($date_debut) and !empty($date_fin)) // DATE DE DEBUT ET DE FIN
	{
		echo $date_debut.'<br>';
		echo $date_fin.'<br>';

		if ($date_debut < $date_fin) 
		{
			
			if (isset($_POST['choixh']) AND isset($_POST['choixm']))  // HEURE DU DÉBUT DE SCÉNARIO
			{
				$choix_h = $_POST['choixh'];
				$choix_m = $_POST['choixm'];
				//insert dans la bdd
				echo $choix_h.'H'.$choix_m.'m<br>';

				if (isset($_POST['choixh']) AND isset($_POST['choixm']) )  // HEURE DE FIN DE SCÉNARIO
				{
					$choix_h = $_POST['choixh'];
					$choix_m = $_POST['choixm'];
					//insert dans la bdd
					echo $choix_h.'H'.$choix_m.'m<br>';
				}
				else
				{
					$msg="Veuillez renseigner l'heure de fin du scénario.";
				}
				
			}
			else
			{
				$msg="Veuillez renseigner l'heure de début du scénario.";
			}
		}
		else
		{
			$msg = "La date de début du scénario doit être inférieur à la date de fin du scénario.";
		}
	}
	else
	{
		$msg="Veuillez renseigner une date de début et de fin du scénario.";
	}
}

?>