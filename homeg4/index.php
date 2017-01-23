<?php 
    session_start();
    include_once("modele/connexion_base.php"); 
    include_once("vue/commun.php");
    include_once("modele/inscription.php");
    include_once("modele/utilisateur.php");
    include_once("modele/para_capteurs.php");
    include_once("modele/insertpiece.php");
    include_once("modele/edition_profil.php");
    include_once("modele/insertcapteur.php");
    
    //require("modele/para_capteurs.php");*/
    if(!isset($_SESSION["id"]))
    { 
        include("controleur/connexion.php");
    }

    
    if (isset($_POST['forminscription'])) 
        {
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        $n_serie = htmlspecialchars($_POST['n_serie']); 
        
        if (!empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['n_serie'])) 
        {

            $reponse = reqmail($bdd, $mail);
            $mailexist = $reponse-> rowCount(); 
            if ($mailexist == 0)
            {
                if ($mail == $mail2) 
                {
                    if ($mdp == $mdp2) 
                    {
                        $reponse = read_n_serie($bdd, $n_serie);
                        $data = $reponse->fetch();
                
                        if ($reponse -> rowcount() == 1) 
                        {
                            insertutilisateur($bdd, $mail, $mdp);
                            $erreur = "Votre compte a bien été créé !";
                            include('vue/connexion_erreur.php');
                        }
                        else
                        {
                            $erreur="Numéro de série inexistant.";
                            include('vue/inscription_erreur.php');
                        }
                         
                    }
                    else
                    {
                        $erreur ="Les mots de passes ne correspondent pas !";
                        include('vue/inscription_erreur.php');
                    }

                }
                else
                {
                    $erreur ="Votre adresse email ne correspond pas !";
                    include('vue/inscription_erreur.php');
                }
            }
            else
            {
                $erreur = "Cette adresse email existe déjà, veuillez en saisir une nouvelle !";
                include('vue/inscription_erreur.php');
            }
        }
        else
        {
            $erreur = "Veuillez remplir tous les champs !";
            $test = $erreur[1];
            echo($test);
            include('vue/inscription_erreur.php');
        }

    }


    if (isset($_POST['formparapieces'])) 
    {
        $id = intval($_SESSION['id']); // id de session
        $piece = htmlspecialchars($_POST['ajout_piece']); // nom de la piece
        $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
        $reponse = checkCapteur($bdd, $n_serie); 
        $data = $reponse->fetch();
        if ($reponse -> rowcount() == 1) 
        {

            insertpiece($bdd, $piece, $id);
            $id_new_piece = idNewPiece($bdd, $id);
            $id_new_piece2 = $id_new_piece -> fetch();
            echo($id_new_piece2[0]);
            $data = "$data[1]";
            $data = "$data[1]";
            //echo($data); == H T L P ou V
            if($data == "H")
            {
                $type = "humidite";
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie);
                echo "enregistrAIENT humidité";
            }
            elseif($data == "T")
            {
                $type = "temperature";
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie);
                echo "enregistrAIENT Température";
            }
            elseif($data == "L")
            {
                $type = "light";
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie);
                echo "enregistrAIENT lumiere";
            }
            elseif($data == "P")
            {
                $type = 'presence';
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie);
                echo "enregistrAIENT présence";
            }
            elseif($data == "V")
            {
                $type = "volet";
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie);
                echo "enregistrAIENT volet";
            }
        }
        //include'vue/ajout_capteurs.php';
        
    } 





/* -----------------------------------------------------------------------------------------------------------*/





    if (isset($_GET['cible'])) 
    {
        if ($_GET['cible'] == 'ajout_piece') 
        {
            include("vue/ajout_piece.php");
        }
        elseif ($_GET['cible'] == 'ajout_capteurs') 
        {
            include("vue/ajout_capteurs.php");
        }
        elseif ($_GET['cible'] == 'home') // HOME // OK
        {
            include("vue/home.php");
        }
        elseif ($_GET['cible'] == 'page_capteur_commun') 
        {
            $id_piece = $_GET['id_piece'];
            include("vue/page_capteur_commun.php");
        }
        elseif ($_GET['cible'] == 'reglage_capteur') 
        {
            $id_piece = $_GET['id_piece'];
            include("vue/page_reglage_capteur.php");
        }
        elseif ($_GET['cible'] == 'reglage') // REGLAGE
        {
            include("vue/reglage.php");
        }
        elseif ($_GET['cible'] == 'securite') // REGLAGE
        {
            include("vue/home.php");
        }
        elseif ($_GET['cible'] == 'systeme') 
        {
            include("#");
        }
        elseif ($_GET['cible'] == 'cgu') 
        {
            include("#");
        }
        elseif ($_GET['cible'] == 'edition_profil') // OK
        {
            include("vue/edition_profil.php");
        }
        elseif ($_GET['cible'] == 'newsletter') // CONTACT
        {
            include("vue/newsletter.php");
        }
        elseif ($_GET['cible'] == 'forum') 
        {
            include("#");
        }
        elseif ($_GET['cible'] == 'sav') 
        {
            include("vue/sav.php");
        }
        elseif ($_GET['cible'] == 'lampes') // ASIDE
        {
            include("vue/liste_capteur_lampe.php");
        }
        elseif ($_GET['cible'] == 'chauffage') 
        {
            include("vue/liste_capteur_chauffage.php");
        }
        elseif ($_GET['cible'] == 'volets') 
        {
            include("vue/liste_capteur_volet.php");
        }
        elseif ($_GET['cible'] == 'alarme') 
        {
            include("vue/liste_capteur_alarme.php");
        }
        elseif ($_GET['cible'] == 'cameras') 
        {
            include("vue/liste_capteur_camera.php");
        }

        //ADMIN

        elseif ($_GET['cible'] == "home_admin") //OK
        {
            include("vue/home_admin.php");
        }
        elseif ($_GET['cible'] == "utilisateur") // OK
        {
            include("vue/gestion_utilisateur.php"); 
        }
        elseif ($_GET['cible'] == "confirme") // OK
        {
            $id_mbr = $_GET['confirme'];
            include("vue/gestion_utilisateur.php");
        }
        elseif ($_GET['cible'] == "delete") // OK
        {
            $id_mbr = $_GET['delete'];
            include("vue/gestion_utilisateur.php");
        }
        else if ($_GET['cible'] == "deconnexion") // OK
        {
        // Détruit toutes les variables de session
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) 
        {
         setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
        include("Vue/page_connexion.php");
        }

    }  

 
?>
