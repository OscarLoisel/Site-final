<?php 

/*if (isset($_SESSION['id']))
{
	if (isset($_POST['formeditionprofil']))
	{
		//$reponse = selectid($bdd, $_SESSION['id']);
		//$user = $reponse->fetch();

		if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND isset($_POST['newmail2']) AND !empty($_POST['newmail2']) AND is_null($_POST['newmdp'] AND is_null($_POST['newmdp2'])))
		{
			echo('1er if');
			$mail = htmlspecialchars($_POST['newmail']);
			$mail2 = htmlspecialchars($_POST['newmail2']);

			if($mail== $mail2)
			{
				$reponse = editmail($bdd, $mail, $_SESSION['id']);
			}
			else
			{
				$msg= "Vos adresses emails ne correspondent pas !";
				include("vue/edition_profil_erreur.php");
			}
			

		}

		elseif(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']) AND is_null($_POST['newmail']) AND is_null($_POST['newmail2']))
		{
			$mdp = htmlspecialchars($_POST['newmdp']);
			$mdp2 = htmlspecialchars($_POST['newmdp2']);
			echo('2e if');
			if ($mdp == $mdp2) 
			{
				$reponse = editmdp($bdd, $mdp, $_SESSION['id']);	
				//include("vue/edition_profil.php");
			}
			
			else
			{
				$msg= "Vos deux mots de passe ne correspondent pas !";
				include("vue/edition_profil_erreur.php");
			}

		}
		elseif(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND isset($_POST['newmail2']) AND !empty($_POST['newmail2']) AND isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
		{

			echo('3e if');

			$mail = htmlspecialchars($_POST['newmail']);
			$mail2 = htmlspecialchars($_POST['newmail2']);

			if($mail== $mail2)
			{
				$reponse = editmail($bdd, $mail, $_SESSION['id']);
			}
			else
			{
				$msg= "Vos adresses emails ne correspondent pas !";
				include("vue/edition_profil_erreur.php");
			}

			$mdp = htmlspecialchars($_POST['newmdp']);
			$mdp2 = htmlspecialchars($_POST['newmdp2']);

			if ($mdp == $mdp2) 
			{
				$reponse = editmdp($bdd, $mdp, $_SESSION['id']);	
				//include("vue/edition_profil.php");
			}
			
			else
			{
				$msg= "Vos deux mots de passe ne correspondent pas !";
				include("vue/edition_profil_erreur.php");
			}
		}
		else
			{
				$msg = "Veuillez remplir les deux champs attribués aux mots de passe";
				include("vue/edition_profil_erreur.php");
			}
	}
}
?> */

if (isset($_SESSION['id']))
{
	if (isset($_POST['formeditionprofil']))
	{
		//$reponse = selectid($bdd, $_SESSION['id']);
		//$user = $reponse->fetch();

		if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND isset($_POST['newmail2']) AND !empty($_POST['newmail2']))
		{
			//echo('1er if');
			$mail = htmlspecialchars($_POST['newmail']);
			$mail2 = htmlspecialchars($_POST['newmail2']);

			if($mail== $mail2)
			{
				$reponse = editmail($bdd, $mail, $_SESSION['id']);
			}
			else
			{
				$msg= "Vos adresses emails ne correspondent pas !";
				include("vue/edition_profil_erreur.php");
			}
		}

		if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
		{
			$mdp = htmlspecialchars($_POST['newmdp']);
			$mdp2 = htmlspecialchars($_POST['newmdp2']);
			//echo('2e if');
			if ($mdp == $mdp2) 
			{
				$reponse = editmdp($bdd, $mdp, $_SESSION['id']);	
				//include("vue/edition_profil.php");
			}
			
			else
			{
				$msg= "Vos deux mots de passe ne correspondent pas !";
				include("vue/edition_profil_erreur.php");
			}
		}
	}
}

?>