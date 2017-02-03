<?php
include_once('modele/update_chauffage.php');

// BOUTON ALLUMER / ETEINDRE

$id_utilisateur = $_SESSION['id'];

if (isset($_POST['allumer'])) 
{
	//echo "le bouton a été appuyer";
	$reponse = read_chauffage($bdd, $id_utilisateur);
	$data = $reponse-> fetchAll();
	$data_size = sizeof($data);
	echo 'taille :<br>'.$data_size;
	for ($i=0; $i < $data_size; $i++)   
	{
		echo $data[$i][0];
		$reponse = update_chauffage_on($bdd, $data[$i][0]);
	}
}
    
if (isset($_POST['eteindre']))
{	
	$reponse = read_chauffage($bdd, $id_utilisateur);
	$data = $reponse-> fetchAll();
	$data_size = sizeof($data);
	echo 'taille :<br>'.$data_size;
	for ($i=0; $i < $data_size; $i++)   
	{
		echo $data[$i][0];
		$reponse = update_chauffage_off($bdd, $data[$i][0]);
	}
	
}

?>