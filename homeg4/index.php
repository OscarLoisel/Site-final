<?php 
    session_start();
    include_once("modele/connexion_base.php"); 
    include_once("vue/commun.php");
    include_once("modele/inscription.php");
    include_once("modele/utilisateur.php");
    include_once("modele/para_capteurs.php");
    include_once("modele/insertpiece.php");
    /*include("modele/insertcapteur.php");
    
    require("modele/para_capteurs.php");*/
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
        $id = intval($_SESSION['id']);
        $piece = htmlspecialchars($_POST['ajout_piece']);
        insertpiece($bdd, $piece, $id);
        include'vue/ajout_capteurs.php';
        echo "enregistrer";
    } 


   

    if (isset($_POST["formparacapteurs"]))
    {
        $reponse = read_n_serie($bdd, $n_serie);
        $data = $reponse->fetch();
                
        if ($reponse -> rowcount() == 1) 
        {
        $id = intval($_SESSION['id]']);
        $n_serie = htmlspecialchars($_POST['ajout_capteurs']);
        insertcapteur2($bdd, $id, $n_serie);
        echo "enregistré";
        }
    }
       
/*        if(empty($_GET['id_piece']))
            {
                $id_piece = $data[0][0];
            }
        else
            { 
                $id_piece = $_GET['id_piece'];
            }
        $nbr_volet = htmlspecialchars($_POST['nbr_volet']);
        $nbr_chauffage = htmlspecialchars($_POST['nbr_chauffage']);
        $nbr_light = htmlspecialchars($_POST['nbr_light']);
        $nbr_baro = htmlspecialchars($_POST['nbr_baro']);
        $nbr_presence = htmlspecialchars($_POST['nbr_presence']);
        $nbr_camera = htmlspecialchars($_POST['nbr_camera']);
    
        for ($i=1; $i <= $nbr_volet ; $i++)     
        {
            if ($i == 1) 
            {
                $capteur = "Volet";
                $type = "volet";
            }
            else
            {
                $capteur = "Volet ".$i."";
                $type = "volet";
            }
            insertcapteur($bdd, $id_piece, $capteur, $type);
        }

        for ($i=1; $i <= $nbr_chauffage ; $i++) 
        {
            if ($i == 1) 
            {
                $capteur = "Chauffage";
                $type = "chauffage";
            }
            else
            {
                $capteur = "Chauffage ".$i."";
                $type = "chauffage";
            }
            insertcapteur($bdd, $id_piece, $capteur, $type);
        }

        for ($i=1; $i <= $nbr_light ; $i++) 
        {
            if ($i == 1) 
            {
                $capteur = "Lumière";
                $type = "light";
            }
            else
            {
                $capteur = "Lumière ".$i."";
                $type = "light";
            }
            insertcapteur($bdd, $id_piece, $capteur, $type);
        }

        for ($i=1; $i <= $nbr_baro ; $i++) 
        {
            if ($i == 1) 
            {
                $capteur = "Barométre";
                $type = "baro";
            }
            else
            {
                $capteur = "Barométre ".$i."";
                $type = "baro";
            }
            insertcapteur($bdd, $id_piece, $capteur, $type);
        }

        for ($i=1; $i <= $nbr_presence ; $i++) 
        {
            if ($i == 1) 
            {
                $capteur = "Capteur de présence";
                $type = "presence";
            }
            else
            {
                $capteur = "Capteur de présence ".$i."";
                $type = "presence";
            }
            insertcapteur($bdd, $id_piece, $capteur, $type);
        }

        for ($i=1; $i <= $nbr_camera ; $i++) 
        {
            if ($i == 1) 
            {
                $capteur = "Caméra";
                $type = "cam";
            }
            else
            {
                $capteur = "Caméra ".$i."";
                $type = "cam";
            }
            insertcapteur($bdd, $id_piece, $capteur, $type);
        }
    }




/* -----------------------------------------------------------------------------------------------------------*/





    if (isset($_GET['cible'])) 
    {
        if ($_GET['cible'] == 'ajout_piece') 
        {
            include("vue/ajout_piece.php");
        }
        if ($_GET['cible'] == 'ajout_capteurs') 
        {
            include("vue/ajout_capteurs.php");
        }
        elseif ($_GET['cible'] == 'home') // HOME // OK
        {
            include("vue/home.php");
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
            include("#");
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
        elseif ($_GET['cible'] == "sav") // OK
        {
            include("vue/sav.php");
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
