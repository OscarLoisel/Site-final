<?php
include_once("modele/update_chauffage_commun.php");

// BOUTON ALLUMER / ETEINDRE

$id_utilisateur = $_SESSION['id'];
echo $id_piece;

if (isset($_POST['allumer_temperature'])) 
{
	//echo "le bouton a été appuyer";
	$reponse = read_chauffage_commun($bdd, $id_piece, $id_utilisateur);
	$data = $reponse-> fetchAll();
	//echo $data[0][0].'<br>';
	$data_size = sizeof($data);
	//echo 'taille :'.$data_size.'<br>';
	for ($i=0; $i < $data_size; $i++)   
	{
		echo $data[$i][0];
		$reponse = update_chauffage_commun_on($bdd, $data[$i][0]);
	}
}
    
if (isset($_POST['eteindre_temperature']))
{	
	$reponse = read_chauffage_commun($bdd, $id_piece, $id_utilisateur);
	$data = $reponse-> fetchAll();
	//echo $data[0][0].'<br>';
	$data_size = sizeof($data);
	//echo 'taille :'.$data_size.'<br>';
	for ($i=0; $i < $data_size; $i++)   
	{
		echo $data[$i][0];
		$reponse = update_chauffage_commun_off($bdd, $data[$i][0]);
	}
	
}
?>