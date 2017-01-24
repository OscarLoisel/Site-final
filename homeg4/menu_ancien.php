	<nav>
		<ul id ="menu-accordeon">

			<?php

			if($etape == "home")
			{
                echo('<li><a href="index.php?cible=home"><strong>Home</strong></a></li>');
            }
            else
            {
            	echo('<li><a href="index.php?cible=home">Home</a></li>');
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
            	echo('<li><a href="index.php?cible=contact"><strong>Contact</strong></a></li>');
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
            	echo('<li><a href="index.php?cible=deconnexion">Déconnexion</a></li>');
            }

			?>
			
		</ul>
	</nav>






	<header>
			<div class="logo">
				<a href="index.php?cible=home"><img src="images/logo.png" alt= "logo"></a>
			</div>
			<nav>
				<ul id ="menu-accordeon">

					<?php

					if($etape=="home")
					{
	                    echo('<li><a href="index.php?cible=home"><strong>Home</strong></a></li>');
	                }
	                else
	                {
	                	echo('<li><a href="index.php?cible=home">Home</a></li>');
	                }
	                if($etape=="reglage")
	                {
	                	echo('<li id="reglage"><a href="index.php?cible=reglage"><strong>Réglage</strong></a>');
	                }
	                else
	                {
	                	echo('<li id="reglage"><a href="index.php?cible=reglage">Réglage</a>');
	                }
					 
					 ?>
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
			                    echo('<li id="reglage_3"><a href="index.php?cible=cgu"><strong>Conditions générales d\'utilisation</strong></a></li>'); // voir pour l'appostophe
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
					</li>

					<li id="contact"><a href="#">Contact</a>
						<ul>

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

						</ul>
					</li>

					<?php

					if($etape=="deconnexion") //AND isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
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