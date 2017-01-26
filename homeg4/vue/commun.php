<?php

function entete($etape)
{
	ob_start();

/*if (isset($_GET['id']) AND $_GET['id']> 0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd ->prepare('SELECT * FROM utilisateur WHERE id = ?');
	$requser -> execute(array($getid));
	$userinfo = $requser->fetch();
*/
?>
		<header>

			<div class="logo">
				<a href="index.php?cible=home"><img src="images/logo.png" alt= "logo"></a>
			</div>

			<nav>
				<ul id ="menu-accordeon">

					<?php

					if($etape == "home")
					{
		                echo('<li class="radiusl"><a href="index.php?cible=home"><strong>Home</strong></a></li>');
		            }
		            else
		            {
		            	echo('<li class="radiusl"><a href="index.php?cible=home">Home</a></li>');
		            }
		            if($etape == "reglage")
		            {
		            	echo('<li id="reglage"><a href="index.php?cible=reglage"><strong>Réglage</strong></a>');
		            }
		            else
		            {
		            	echo('<li id="reglage"><a href="index.php?cible=reglage">Réglage</a>');
		            }
		            if ($etape == "contact") 
		            {
		            	echo('<li class="divider"><a href="index.php?cible=contact"><strong>Contact</strong></a></li>');
		            }
		            else
		            {
		            	echo('<li id="reglage"><a href="index.php?cible=contact">Contact</a>');
		            }
					if($etape == "deconnexion") //AND isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
					{
		                echo('<li><a href="index.php?cible=deconnexion">Déconnexion</a></li>');
		            }
		            else
		            {
		            	echo('<li class="radiusr"><a href="index.php?cible=deconnexion">Déconnexion</a></li>');
		            }

					?>
					
				</ul>
			</nav>

		</header>
	<?php
	$entete = ob_get_clean();
	return $entete;
}
//}








function enteteConnexion()
{
	ob_start();
	?>
	<header>
			<div class="logo">
				<a href="index.php?cible=connexion_base"><img src="images/logo.png" alt= "logo"></a>
			</div>
			<div id = "formulaire_connexion">
				<form method="POST" action="index.php?cible=verif">
					<table class="tableau_connexion">
					
					<td>
							<label for="mailconnect"> Adresse e-mail :</label><br />


							<input type="email" name="mailconnect" placeholder="Mail">
					</td>
					
					
					<td>
							<label for="mdpconnect">Mot de passe :</label><br />


							<input type="password" name="mdpconnect" placeholder="Mot de passe">
					</td>
					
					
						
						<td>
							<br /><input type="submit" name="formconnexion" value="Se connecter">
						</td>
					
					
							<td>
							
							</td>
							<td>
								<br /><input type="submit" name="bouton_inscription" value="Créer un compte">
							</td>
						
					</table>
				</form>

			</div>
	</header>

	<?php 
	$entete = ob_get_clean();
	return $entete;
}








function enteteAdmin($etape)
{
	ob_start();
	?>
	<header>
			<div class="logo">
				<a href="index.php?cible=home"><img src="images/logo.png" alt= "logo"></a>
			</div>
			<nav>
				<ul id ="menu-accordeon">
					<?php

					if($etape=="home")
					{
	                    echo('<li><a href="index.php?cible=home_admin"><strong>Home</strong></a></li>');
	                }
	                else
	                {
	                	echo('<li><a href="index.php?cible=home_admin">Home</a></li>');
	                }
	                if($etape=="utilisateur")
					{
	                    echo('<li><a href="index.php?cible=utilisateur"><strong>Utilisateur</strong></a></li>');
	                }
	                else
	                {
	                	echo('<li><a href="index.php?cible=utilisateur">Utilisateur</a></li>');
	                }
	                if($etape=="deconnexion") 
					{
	                    echo('<li><a href="index.php?cible=deconnexion">Déconnexion</a></li>');
	                }
	                else
	                {
	                	echo('<li><a href="index.php?cible=deconnexion">Déconnexion</a></li>');
	                }

					?>
						
				</ul>
			</nav>
	</header>

	<?php 
	$entete = ob_get_clean();
	return $entete;
}






function aside($etape)
{
	ob_start();
	?>

		<div id="tdb">
				<table id="tableau_tdb">

					<tr>
						<td colspan="2">TABLEAU DE BORD</td>
					</tr>

					<tr>
						<td class="critere">Température</td>
						<td class="critere">Humidité</td>
					</tr>

					<tr>
						<td class="critere">Alarme</td>
						<td class="critere">Caméras</td>
					</tr>

				</table>
		</div>

		<div id="menu_capteurs">
			<div id="liste_capteurs"  class="test">
				<ul>

				<?php

				if($etape=="lampes")
				{
                    echo('<li><a href="index.php?cible=lampes"><strong>Lampes</strong></a></li>'); 
                }
                else
	            {
	            	echo('<li><a href="index.php?cible=lampes">Lampes</a></li>');
	            }
                if($etape=="chauffage")
				{
                    echo('<a href="index.php?cible=chauffage"><li><strong>Chauffage</strong></li></a>'); 
                }
                else
	            {
	            	echo('<li><a href="index.php?cible=chauffage">Chauffage</a></li>');
	            }
                if($etape=="volets")
				{
                    echo('<a href="index.php?cible=volets"><li><strong>Volets</strong></li></a>'); 
                }
                else
	            {
	            	echo('<li><a href="index.php?cible=volets">Volets</a></li>');
	            }
                if($etape=="alarme")
				{
                    echo('<a href="index.php?cible=alarme"><li><strong>Alarme</strong></li></a>'); 
                }
                else
	            {
	            	echo('<li><a href="index.php?cible=alarme">Alarme</a></li>');
	            }
                if($etape=="cameras")
				{
                    echo('<a href="index.php?cible=cameras"><li><strong>Caméras</strong></li></a>'); 
                }
                else
	            {
	            	echo('<li><a href="index.php?cible=cameras">Caméras</a></li>');
	            }


				?>
					
				</ul>
			</div> 
			
		</div>

	<?php
	$aside = ob_get_clean();
	return $aside;
}






function asideHorsConnexion()
{
	ob_start();
	?>

	<?php
	$asideHorsConnexion= ob_get_clean();
	return $asideHorsConnexion;
}


function asideReglage($etape)
{
	ob_start();
	?>
	<div id="menu_capteurs">
			<div id="liste_capteurs"  class="test">
				<ul>

				<?php

					if($etape=="securite")
					{
	                    echo('<li><a href="index.php?cible=securite"><strong>Sécurité</strong></a></li>');
	                }
	                else
            		{
            			echo('<li><a href="index.php?cible=securite">Sécurité</a></li>');
            		}
	                if($etape=="systeme")
					{
	                    echo('<li><a href="index.php?cible=systeme"><strong>Système</strong></a></li>');
	                }
	                else
            		{
            			echo('<li><a href="index.php?cible=systeme">Système</a></li>');
            		}
	                if($etape=="cgu")
					{
	                    echo('<li id="reglage_3"><a href="index.php?cible=cgu"><strong>Conditions générales d\'utilisation</strong></a></li>'); 
	                }
	                else
            		{
            			echo('<li><a href="index.php?cible=cgu">Conditions générales d\'utilisation</a></li>');
            		}
	                if($etape=="edition_profil"/* AND isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']*/)
					{
	                    echo('<li id="reglage_4"><a href="index.php?cible=edition_profil"><strong>Editer mon profil</strong></a></li>');
	                }
	                else
            		{
            			echo('<li><a href="index.php?cible=edition_profil">Editer mon profil</a></li>');
            		}

                ?>

				</ul>
			</div>
	</div>
	<?php
	$asideHorsConnexion= ob_get_clean();
	return $asideHorsConnexion;
}

function asideContact($etape)
{
	ob_start();
	?>
	<div id="menu_capteurs">
			<div id="liste_capteurs"  class="test">

				<?php

					if($etape=="newsletter")
					{
	                    echo('<li id="contact_1"><a href="index.php?cible=newsletter">Newsletter</a></li>'); 
	                }
	                else
            		{
            			echo('<li><a href="index.php?cible=newsletter">Newsletter</a></li>');
            		}
	                if($etape=="forum")
					{
	                    echo('<li id="contact_2"><a href="index.php?cible=forum">Forum</a></li>'); 
	                }
	                else
            		{
            			echo('<li><a href="index.php?cible=forum">Forum</a></li>');
            		}
	                if($etape=="sav")
					{
	                    echo('<li id="contact_3"><a href="index.php?cible=sav">S.A.V</a></li>'); 
	                }
	                else
            		{
            			echo('<li><a href="index.php?cible=sav">S.A.V</a></li>');
            		}

                ?>
			</div>
	</div>
	<?php
	$asideHorsConnexion= ob_get_clean();
	return $asideHorsConnexion;
}





function contenu()
{
	ob_start();
	?>

	<?php
	$contenu= ob_get_clean();
	return $contenu;
}






function pied()
{ // FAIRE LES LIENS !!!!!
	ob_start();
	?>
		<footer>
            <div id="contact_pied">
                <h2>Contact</h2>
                <ul>
                    <li><a href="mailto:siteomeg4@gmail.com" title="Courrier électronique">Écrivez-nous</a></li>
                    <li><a href="#" title="Téléphone">Appelez-nous</a></li>
                    <li><a href="#" title="Venir nous voir">Venir nous voir</a></li>
                </ul>
            </div>
            
            <div id="mentions_pied">
                <h2>Mentions légales</h2>
                <ul>
                    <li><a href="index.php?cible=cgu" title="Lire les mentions légales">Lire</a></li>
                    <li><a href="controleur/cguDW.php" title="Télécharger les mentions légales">Télécharger en pdf</a></li>
                </ul>
            </div>
            
            <div id="reseaux_pied">
                <h2>Nous suivre sur :</h2>
                <a href="https://www.facebook.com/Homeg4-1704397496541016/"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="https://twitter.com/Homeg_4"><img src="images/twitter.png" alt="Twitter"></a>
            </div>
         
        </footer>

	<?php
	$pied = ob_get_clean();
	return $pied;
}


function pieda()
{ // FAIRE LES LIENS !!!!!
	ob_start();
	?>
		<footer>
            <div id="contact_pied">
                <h2>Contact</h2>
                <ul>
                    <li><a href="mailto:siteomeg4@gmail.com" title="Courrier électronique">Écrivez-nous</a></li>
                    <li><a href="#" title="Téléphone">Appelez-nous</a></li>
                    <li><a href="#" title="Venir nous voir">Venir nous voir</a></li>
                </ul>
            </div>
            
            <div id="mentions_pied">
                <h2>Mentions légales</h2>
                <ul>
                    <li><a href="index.php?cible=cguA" title="Lire les mentions légales">Lire</a></li>
                    <li><a href="controleur/cgudw.php" title="Télécharger les mentions légales">Télécharger en pdf</a></li>
                </ul>
            </div>
            
            <div id="reseaux_pied">
                <h2>Nous suivre sur :</h2>
                <a href="https://www.facebook.com/Homeg4-1704397496541016/"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="https://twitter.com/Homeg_4"><img src="images/twitter.png" alt="Twitter"></a>
            </div>
         
        </footer>

	<?php
	$pieda = ob_get_clean();
	return $pieda;
}

/* -----------------------------------------------------------------------------------------------------------*/


/*PAGE D'INSCRIPTION */

function forminscription()
{
	ob_start();
	?>
	
	<form method="POST" action="">
		<table id="tableau_inscription">
			<tr>
				<td colspan="2">
					<h1>Inscription</h1>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mail">Mail :</label>
				</td>
				<td>
					<input type="email" name="mail" placeholder="Mail" id="mail" style="width: 250px; height: 15px;" value="<?php if (isset($mail)) { echo $mail;} ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="mail2">Confirmer votre mail :</label>
				</td>
				<td>
					<input type="email" name="mail2" placeholder="Confirmer votre mail" id="mail2" style="width: 250px; height: 15px;" value="<?php if (isset($mail2)) { echo $mail2;} ?>">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="mdp">Mot de passe :</label>
				</td>
				<td>
					<input type="password" name="mdp" placeholder="Mot de passe" id="mdp" style="width: 250px; height: 15px;">
				</td>
			</tr>

			<tr>
				<td>
					<label for="mdp2">Confirmer votre mot de passe :</label>
				</td>
				<td>
					<input type="password" name="mdp2" placeholder="Confirmer le mot de passe" id="mdp2" style="width: 250px; height: 15px;">
				</td>
			</tr>

			<tr>
				<td>
					<label for="n_serie">Numéro de série :</label>
				</td>
				<td>
					<input type="text" name="n_serie" placeholder="Numéro de série" id="n_serie" style="width: 250px; height: 15px;">
				</td>
			</tr>
			<tr>
				<td>
						
				</td>
				<td>
					<br/>
					<input type="submit" value="Je m'inscris" name="forminscription" style="width: 150px;">
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<br/><br/>
					<div id="msg_erreur">
					<?php if (isset($erreur)) { echo '<font color="red">'.$erreur.'</font>';}?>
					</div>
				</td>
			</tr>
		</table>	
	</form>
	<?php
	$forminscription = ob_get_clean();
	return $forminscription;
}



/* -----------------------------------------------------------------------------------------------------------*/



function edition_profil()
{
	ob_start();
	?>
	<div id="editionprofil">
		<form method="POST" action="">
			<table id="tableau_editionprofil">

				<tr>
					<td>
						<label for="newmail">Nouveaux mail :</label>
					</td>
					<td>
						<input type="email" name="newmail" id="newmail" placeholder="Mail">
					</td>
				</tr>

				<tr>
					<td>
						<label for="newmail2">Confirmez votre mail :</label>
					</td>
					<td>
						<input type="email" name="newmail2" id="newmail2" placeholder="Mail">
					</td>
				</tr>

				<tr>
					<td>
						<label for="newmdp">Nouveau mot de passe :</label>
					</td>
					<td>
						<input type="password" name="newmdp" id="newmdp" placeholder="Mot de passe" >
					</td>
				</tr>

				<tr>
					<td>
						<label for="newmdp2">Confirmez votre mot de passe :</label>
					</td>
					<td>
						<input type="password" name="newmdp2" id="newmdp2" placeholder="Mot de passe">
					</td>
				</tr>


				<tr>
					<td>
					
					</td>
					<td>
						<br>
						<input type="submit" value="Mettre à jour mon profil" name="formeditionprofil">
					</td>
				</tr>

			</table>
		</form>
	</div>

	<?php
	$editeurProfil = ob_get_clean();
	return $editeurProfil;
}


function grillecapteurs ($piece = '')
{
	ob_start();
	?>

		<div id ="nom_piece">
			<h1> <?php echo $piece ?></h1>
		</div>


		<div class="nom_capteur"> 
			<h3> <?php echo $capteur ?> </h3>
		</div>



	<?php
	$grillecapteurs = ob_get_clean();
	return $grillecapteurs;
}


/* -----------------------------------------------------------------------------------------------------------*/

// FONCTION DE PARAMAETRAGE


function formulaireParapiece()
{
	ob_start();
	?>
	<div id="parametrage">
		<form method="POST" action="">
			<table id="tableau_parametrage_pieces">


				<tr>
					<td>
						<label for="ajout_piece">Ajouter une piéce :</label>
					</td>
					<td>
						<input type="text" name="ajout_piece" id="ajout_piece" placeholder="nom de la salle">
					</td>
				</tr>

				<div id="test2">
				<tr>
					<td>
						<label for="ajout_capteur">Ajouter un capteur :</label>
					</td>
					<td>
						<input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série">
					</td>
				</tr>
				</div>


			    <script type="text/javascript" >
			        var div = document.getElementById('champs');
			        function addInput(nam){
			            var input = document.createElement("input");
			            input.name = name;
			            div.appendChild(input);
			            return false;
			        }
			        function addField() {
			        	alert("test");
			        	$("<p>textes</p>").append("#test2");
			            return false;
			        }
			    </script>

				<tr>
					<td>
					
					</td>
					<td>
						<br>
						<button type="button" onclick="addField()" >+</button>
						<input type="submit" value="Ajouter" name="formparapieces">
					</td>
				</tr>

			</table>
		</form>
	</div>

	<?php
	$paraPieces = ob_get_clean();
	return $paraPieces;
}


function formulaireParacapteurs ($piece = '')
{
	ob_start();
	?>
		<form method="post" action="" >
			<table id="tableau_parametrage_capteurs">

				<tr>
					<td colspan="2">
						<h1><?php echo $piece; ?></h1>
					</td>
				</tr>
 
				<div id="champs">
					<tr>
						<td>
							<label for="ajout_capteur">Ajouter un capteur :</label>
						</td>
						<td>
							<input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="Numéro de série">
						</td>
					</tr>
				</div>


			    <script type="text/javascript" >
			        var div = document.getElementById('champs');
			        function addInput(nam){
			            var input = document.createElement("input");
			            input.name = name;
			            div.appendChild(input);
			        }
			        function addField() {
			            addInput("ajout_capteur[]");
			            div.appendChild(document.createElement("br"));
			        }
			    </script>

				<tr>
					<td>
									
					</td>
					<td>
						<br>
						<button type="button" onclick="addField()" >+</button>
						<input type="submit" value="valider" name="formparacapteurs">
					</td>
				</tr>
			</table>
		</form>
	</div>
				

	<?php
	$paraPieces = ob_get_clean();
	return $paraPieces;
}


/* -----------------------------------------------------------------------------------------------------------*/



//FONCTION D'AFFICHAGES DES CONSOLES CAPTEURS



function console_volet()
{
	ob_start();
	?>
	<form >
		<input type="radio" name="fermer">FERMER
		<input type="radio" name="ouvrir">OUVRIR
		<script type="text/javascript">
			$('input[name$="fermer"]').click(function(){
			});
			$('input[name$="ouvrir"]').click(function(){});
		</script>
	</form>

	
	<?php
	$console_volet = ob_get_clean();
	return $console_volet;
}

function console_light()
{
	ob_start();
	?>
	<a href="">
		<div class="bouton_allumer">ALLUMER</div>
	</a>
	<a href="">
		<div class="bouton_eteindre">ETEINDRE</div>
	</a>
	<?php
	$console_light = ob_get_clean();
	return $console_light;
}

function console_temperature()
{
	ob_start();
	?>
	<div id="valeur_temperature">
		<!-- <?php echo $data['valeur']; ?> -->
	</div>

	<form action="" method="POST">
		<input type="range" name="curseur_temperature" id="curseur_temperature">
		<input type="submit" name="formvaleur_temperature" value="Actualiser">
	</form>

	<a href="">
		<div class="bouton_allumer">ALLUMER</div>
	</a>
	<a href="">
		<div class="bouton_eteindre">ETEINDRE</div>
	</a>
	<?php
	$console_temperature = ob_get_clean();
	return $console_temperature;
}

function console_humidite()
{
	ob_start();
	?>
	<div id="valeur_humidite">
		<!-- <?php echo $data['valeur']; ?> -->
	</div>
	<?php
	$console_humidite = ob_get_clean();
	return $console_humidite;
}

function console_alarme()
{
	ob_start();
	?>
	<a href="">
		<div class="bouton_allumer">ALLUMER</div>
	</a>
	<a href="">
		<div class="bouton_eteindre">ETEINDRE</div>
	</a>
	<?php
	$console_alarme = ob_get_clean();
	return $console_alarme;
}

function console_camera()
{
	ob_start();
	?>
	<a href="">
		<div class="bouton_allumer">ALLUMER</div>
	</a>
	<a href="">
		<div class="bouton_eteindre">ETEINDRE</div>
	</a>
	<?php
	$console_camera = ob_get_clean();
	return $console_camera;
}
/* -----------------------------------------------------------------------------------------------------------*/

// REGLAGE CAPTEURS

function listecapteurs()
{
	ob_start();
	?>
		<table id="listecapteurs">
			<tr>
				<td> ID CAPTEUR </td>
				<td>NUMÉRO DE SÉRIE </td>
				<td>VALEUR </td>
				<td> BATTERIE </td>
				<td> DATE </td>
				<td> ETAT </td>
				<td></td>
			</tr>
	<?php
	$listecapteurs = ob_get_clean();
	return $listecapteurs;
}

/* -----------------------------------------------------------------------------------------------------------*/


// FONCTION ADMINISTRATEUR





function acceuiladmin()
{
	ob_start();
	?>

	<h1>Bienvenue sur le portail Administrateur !</h1>
	
	<?php
	$acceuiladmin = ob_get_clean();
	return $acceuiladmin;
}



function gestionmembre()
{
	ob_start();
	?>
		<li> <?php echo $membres['id']; ?> : <?php echo $membres['identifiant']; ?> </li>
		<a href="index.php?cible=delete">Supprimer</a>
	<?php
	$gestionmembre = ob_get_clean();
	return $gestionmembre;
}


/* -----------------------------------------------------------------------------------------------------------*/


// FONCTION ASIDE - LISTE CAPTEUR





function listecapteurlampe()
{
    ob_start();
    ?>
    <br /><br />
	<h1>Lampe</h1>

	<div class="onoffswitch">
		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
		<label class="onoffswitch-label" for="myonoffswitch">
			<span class="onoffswitch-inner"></span>
			<span class="onoffswitch-switch"></span>
		</label>
	</div><br />

	<p><button onclick="scenario()">Créer un scénario</button></p>

	<p id="demo"></p>

	<script>
	function scenario() 
	{
	    document.getElementById("demo").innerHTML = "<div class='cadre'><p>Heure d'allumage ?</p><p><select name='choixh'><option value='defaulth' selected='selected'>Heure</option><option value='choix0'>00</option><option value='choix2'>02</option><option value='choix3'>03</option><option value='choix4'>04</option><option value='choix5'>05</option><option value='choix6'>06</option><option value='choix7'>07</option><option value='choix8'>08</option><option value='choix9'>09</option><option value='choix10'>10</option><option value='choix11'>11</option><option value='choix12'>12</option><option value='choix13'>13</option><option value='choix14'>14</option><option value='choix15'>15</option><option value='choix16'>16</option><option value='choix17'>17</option><option value='choix18'>18</option><option value='choix19'>19</option><option value='choix20'>20</option><option value='choix21'>21</option><option value='choix22'>22</option><option value='choix23'>23</option></select>h<select name='choixm'><option value='defaultm' selected='selected'>Minute</option><option value='min0'>00</option><option value='min15'>15</option><option value='min30'>30</option><option value='min45'>45</option></select></p><p>Heure d'extinction ?</p><p><select name='choixh'><option value='defaulth' selected='selected'>Heure</option><option value='choix0'>00</option><option value='choix2'>02</option><option value='choix3'>03</option><option value='choix4'>04</option><option value='choix5'>05</option><option value='choix6'>06</option><option value='choix7'>07</option><option value='choix8'>08</option><option value='choix9'>09</option><option value='choix10'>10</option><option value='choix11'>11</option><option value='choix12'>12</option><option value='choix13'>13</option><option value='choix14'>14</option><option value='choix15'>15</option><option value='choix16'>16</option><option value='choix17'>17</option><option value='choix18'>18</option><option value='choix19'>19</option><option value='choix20'>20</option><option value='choix21'>21</option><option value='choix22'>22</option><option value='choix23'>23</option></select>h<select name='choixm'><option value='defaultm' selected='selected'>Minute</option><option value='min0'>00</option><option value='min15'>15</option><option value='min30'>30</option><option value='min45'>45</option></select></p></div>";
	}
	</script>

	<?php
    $listecapteurlampe = ob_get_clean();
    return $listecapteurlampe;
}
    
function listecapteurchauffage()
{
    ob_start();
	?>
    <br /><br />
	<h1>Chauffage</h1>

	<div class="onoffswitch">
		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
		<label class="onoffswitch-label" for="myonoffswitch">
			<span class="onoffswitch-inner"></span>
			<span class="onoffswitch-switch"></span>
		</label>
	</div><br />

	<p class="temperature"><input name="sliderinput" id="sliderinput" type="range" value="20" min="15" max="25" oninput="slideroutput.value = sliderinput.value" />
	<output name="slideroutput" id="slideroutput">20</output>°C</p>

	<p><button onclick="scenario()">Créer un scénario</button></p>

	<p id="demo"></p>

	<script>
	function scenario() 
	{
	    document.getElementById("demo").innerHTML = "<div class='cadre'><p>Heure d'allumage ?</p><p><select name='choixh'><option value='defaulth' selected='selected'>Heure</option><option value='choix0'>00</option><option value='choix2'>02</option><option value='choix3'>03</option><option value='choix4'>04</option><option value='choix5'>05</option><option value='choix6'>06</option><option value='choix7'>07</option><option value='choix8'>08</option><option value='choix9'>09</option><option value='choix10'>10</option><option value='choix11'>11</option><option value='choix12'>12</option><option value='choix13'>13</option><option value='choix14'>14</option><option value='choix15'>15</option><option value='choix16'>16</option><option value='choix17'>17</option><option value='choix18'>18</option><option value='choix19'>19</option><option value='choix20'>20</option><option value='choix21'>21</option><option value='choix22'>22</option><option value='choix23'>23</option></select>h<select name='choixm'><option value='defaultm' selected='selected'>Minute</option><option value='min0'>00</option><option value='min15'>15</option><option value='min30'>30</option><option value='min45'>45</option></select></p><p>Heure d'extinction ?</p><p><select name='choixh'><option value='defaulth' selected='selected'>Heure</option><option value='choix0'>00</option><option value='choix2'>02</option><option value='choix3'>03</option><option value='choix4'>04</option><option value='choix5'>05</option><option value='choix6'>06</option><option value='choix7'>07</option><option value='choix8'>08</option><option value='choix9'>09</option><option value='choix10'>10</option><option value='choix11'>11</option><option value='choix12'>12</option><option value='choix13'>13</option><option value='choix14'>14</option><option value='choix15'>15</option><option value='choix16'>16</option><option value='choix17'>17</option><option value='choix18'>18</option><option value='choix19'>19</option><option value='choix20'>20</option><option value='choix21'>21</option><option value='choix22'>22</option><option value='choix23'>23</option></select>h<select name='choixm'><option value='defaultm' selected='selected'>Minute</option><option value='min0'>00</option><option value='min15'>15</option><option value='min30'>30</option><option value='min45'>45</option></select></p></div>";
	}
	</script>

	<?php
    $listecapteurchauffage = ob_get_clean();
    return $listecapteurchauffage;
}

function listecapteurvolet()
{
    ob_start();
    ?>
    <br /><br />
	<h1>Volet</h1>

	<div class="onoffswitch">
		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
		<label class="onoffswitch-label" for="myonoffswitch">
			<span class="onoffswitch-inner"></span>
			<span class="onoffswitch-switch"></span>
		</label>
	</div><br />

	<p><button onclick="scenario()">Créer un scénario</button></p>

	<p id="demo"></p>

	<script>
	function scenario() 
	{
	    document.getElementById("demo").innerHTML = "<div class='cadre'><p>Ouvrir les volets à ?</p><p><select name='choixh'><option value='defaulth' selected='selected'>Heure</option><option value='choix0'>00</option><option value='choix2'>02</option><option value='choix3'>03</option><option value='choix4'>04</option><option value='choix5'>05</option><option value='choix6'>06</option><option value='choix7'>07</option><option value='choix8'>08</option><option value='choix9'>09</option><option value='choix10'>10</option><option value='choix11'>11</option><option value='choix12'>12</option><option value='choix13'>13</option><option value='choix14'>14</option><option value='choix15'>15</option><option value='choix16'>16</option><option value='choix17'>17</option><option value='choix18'>18</option><option value='choix19'>19</option><option value='choix20'>20</option><option value='choix21'>21</option><option value='choix22'>22</option><option value='choix23'>23</option></select>h<select name='choixm'><option value='defaultm' selected='selected'>Minute</option><option value='min0'>00</option><option value='min15'>15</option><option value='min30'>30</option><option value='min45'>45</option></select></p><p>Fermer les volets à ?</p><p><select name='choixh'><option value='defaulth' selected='selected'>Heure</option><option value='choix0'>00</option><option value='choix2'>02</option><option value='choix3'>03</option><option value='choix4'>04</option><option value='choix5'>05</option><option value='choix6'>06</option><option value='choix7'>07</option><option value='choix8'>08</option><option value='choix9'>09</option><option value='choix10'>10</option><option value='choix11'>11</option><option value='choix12'>12</option><option value='choix13'>13</option><option value='choix14'>14</option><option value='choix15'>15</option><option value='choix16'>16</option><option value='choix17'>17</option><option value='choix18'>18</option><option value='choix19'>19</option><option value='choix20'>20</option><option value='choix21'>21</option><option value='choix22'>22</option><option value='choix23'>23</option></select>h<select name='choixm'><option value='defaultm' selected='selected'>Minute</option><option value='min0'>00</option><option value='min15'>15</option><option value='min30'>30</option><option value='min45'>45</option></select></p></div>";
	}
	</script>

	<?php
    $listecapteurvolet = ob_get_clean();
    return $listecapteurvolet;
}
    
function listecapteuralarme()
{
    ob_start();
    ?>

    <br /><br />
	<h1>Alarme</h1>

	<div class="onoffswitch">
		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
		<label class="onoffswitch-label" for="myonoffswitch">
			<span class="onoffswitch-inner"></span>
			<span class="onoffswitch-switch"></span>
		</label>
	</div>

	<?php
    $listecapteuralarme = ob_get_clean();
    return $listecapteuralarme;
}
    
function listecapteurcamera()
{
    ob_start();
    ?>

    <br /><br />
	<h1>Caméra</h1>

	<div class="onoffswitch">
		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
		<label class="onoffswitch-label" for="myonoffswitch">
			<span class="onoffswitch-inner"></span>
			<span class="onoffswitch-switch"></span>
		</label>
	</div>

	<?php
    $listecapteurcamera = ob_get_clean();
    return $listecapteurcamera;
}

function mentionslegales()
{
    ob_start();
    ?>

    <div>
        
        <h1>Mentions légales</h1>
        </br>
        Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses pages. En vous connectant sur ce site, vous acceptez sans réserves les présentes modalités. Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie numérique, les responsables du présent site internet <a href="http://www.homeg4.com">www.homeg4.com</a> sont :
        
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Editeur du Site : </b></span></p>
        HOMEG4
        Numéro de SIRET :  12345678901234
        Responsable editorial : HOMEG4
        10 rue des Vanves
        Téléphone :01 49 54 52 00 - Fax : 01 49 54 02 01
        Email : contact@homega.com
        Site Web : <a href="http://www.homeg4.com">www.homeg4.com</a>
        </br>
        <p style="color: #b51a00;"><b><span style="color: rgb(0, 0, 0);">Hébergement :</span> </b></p>
        Hébergeur : OVH
        2 rue Kellermann 59100 Roubaix
        Site Web :  <a href="http://www.OVH.com">www.OVH.com</a>
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Développement</b><b> : </b></span></p>
        HOMEG4
        Adresse : 28 rue Notre-Dame des Champs 75006 Paris
        Site Web : <a href="http://www.homeg4.com">www.homeg4.com</a>
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Conditions d’utilisation : </b></span></p>
        Ce site (<a href="http://www.homeg4.com">www.homeg4.com</a>) est proposé en différents langages web (HTML, HTML5, Javascript, CSS, etc…) pour un meilleur confort d'utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs modernes comme Internet explorer, Safari, Firefox, Google Chrome, etc…
        Les mentions légales ont été générées sur le site <a title="générateur de mentions légales pour site internet gratuit" href="http://www.generateur-de-mentions-legales.com">Générateur de mentions légales</a>, offert par <a title="imprimerie paris, imprimeur paris" href="http://welye.com">Welye</a>.
        
        <span style="color: #323333;">HOMEG4<b> </b></span>met en œuvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L'internaute devra donc s'assurer de l'exactitude des informations auprès de , et signaler toutes modifications du site qu'il jugerait utile. n'est en aucun cas responsable de l'utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.
        
        <b>Cookies</b> : Le site <a href="http://www.homeg4.com">www.homeg4.com</a> peut-être amené à vous demander l’acceptation des cookies pour des besoins de statistiques et d'affichage. Un cookies est une information déposée sur votre disque dur par le serveur du site que vous visitez. Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel un serveur accède pour lire et enregistrer des informations . Certaines parties de ce site ne peuvent être fonctionnelles sans l’acceptation de cookies.
        
        <b>Liens hypertextes :</b> Les sites internet de peuvent offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet. HOMEG4 ne dispose d'aucun moyen pour contrôler les sites en connexion avec ses sites internet. ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l'internaute, qui doit se conformer à leurs conditions d'utilisation.
        
        Les utilisateurs, les abonnés et les visiteurs des sites internet de ne peuvent mettre en place un hyperlien en direction de ce site sans l'autorisation expresse et préalable de HOMEG4.
        
        Dans l'hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d’un des sites internet de HOMEG4, il lui appartiendra d'adresser un email accessible sur le site afin de formuler sa demande de mise en place d'un hyperlien. HOMEG4 se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en justifier sa décision.
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Services fournis : </b></span></p>
        <p style="color: #323333;">L'ensemble des activités de la société ainsi que ses informations sont présentés sur notre site <a href="http://www.homeg4.com">www.homeg4.com</a>.</p>
        <p style="color: #323333;">HOMEG4 s’efforce de fournir sur le site www.homeg4.com des informations aussi précises que possible. les renseignements figurant sur le site <a href="http://www.homeg4.com">www.homeg4.com</a> ne sont pas exhaustifs et les photos non contractuelles. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. Par ailleurs, tous les informations indiquées sur le site www.homeg4.com<span style="color: #000000;"><b> </b></span>sont données à titre indicatif, et sont susceptibles de changer ou d’évoluer sans préavis.  </p>
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Limitation contractuelles sur les données : </b></span></p>
        Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour à différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des omissions. Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email, à l’adresse contact@homega.com, en décrivant le problème de la manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur utilisé, …).
        
        Tout contenu téléchargé se fait aux risques et périls de l'utilisateur et sous sa seule responsabilité. En conséquence, ne saurait être tenu responsable d'un quelconque dommage subi par l'ordinateur de l'utilisateur ou d'une quelconque perte de données consécutives au téléchargement. <span style="color: #323333;">De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</span>
        
        Les liens hypertextes mis en place dans le cadre du présent site internet en direction d'autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de HOMEG4.
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Propriété intellectuelle :</b></span></p>
        Tout le contenu du présent sur le site <a href="http://www.homeg4.com">www.homeg4.com</a>, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.
        
        Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit de HOMEG4. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Déclaration à la CNIL : </b></span></p>
        Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l'égard des traitements de données à caractère personnel) relative à l'informatique, aux fichiers et aux libertés, ce site a fait l'objet d'une déclaration 0000000000 auprès de la Commission nationale de l'informatique et des libertés (<a href="http://www.cnil.fr/">www.cnil.fr</a>).
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Litiges : </b></span></p>
        Les présentes conditions du site <a href="http://www.homeg4.com">www.homeg4.com</a> sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l'interprétation ou de l'exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société. La langue de référence, pour le règlement de contentieux éventuels, est le français.
        </br>
        <p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Données personnelles :</b></span></p>
    
    </div>
    
    <?php
    $mentionslegales = ob_get_clean();
    return $mentionslegales;
}
