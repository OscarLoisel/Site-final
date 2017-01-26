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
    include_once("modele/insertdonnes.php");
    
    //require("modele/para_capteurs.php");*/
    if(!isset($_SESSION["id"]))
    { 
        include("controleur/connexion.php");
    }

// FORMULAIRE INSCRIPTION
    
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
                            include('vue/connexion_success.php');
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

// FORMULAIRE PARA PIECES 

    if (isset($_POST['formparapieces'])) 
    {
        $id = intval($_SESSION['id']); // id de session
        $piece = htmlspecialchars($_POST['ajout_piece']); // nom de la piece
        $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
        $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
        $data = $reponse->fetch();


        $test = read_n_tram($bdd, $id);
        $test2 = $test ->fetch();
        echo($test2['n_tram']);


        if ($reponse -> rowcount() == 1) // si le capteur existe 
        {

            insertpiece($bdd, $piece, $id); // La piece est créée
            $id_new_piece = idNewPiece($bdd, $id);
            $id_new_piece2 = $id_new_piece -> fetch(); // On récupère l'id de la nouvelle piece
            //echo($id_new_piece2[0]);
            $data = "$data[1]";
            $data = "$data[1]"; // == H T L P ou V
            //echo($data); == H T L P ou V
            if($data == "H")
            {
                $type = "humidite";
                $test2 = $test2['n_tram'] + 1;
                echo($test2);
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                echo "enregistrAIENT humidité";
            }
            elseif($data == "T")
            {
                $type = "temperature";
                $test2 = $test2['n_tram'] + 1;
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                echo "enregistrAIENT Température";
            }
            elseif($data == "L")
            {
                $type = "light";
                $test2 = $test2['n_tram'] + 1;
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                echo "enregistrAIENT lumiere";
            }
            elseif($data == "P")
            {
                $type = 'presence';
                $test2 = $test2['n_tram'] + 1;
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                echo "enregistrAIENT présence";
            }
            elseif($data == "V")
            {
                $type = "volet";
                $test2 = $test2['n_tram'] + 1;
                insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                echo "enregistrAIENT volet";
            }
        }
        //include'vue/ajout_capteurs.php';
        
    } 

    if (isset($_POST("form_insert_valeur"))) 
    {
        $tram = htmlspecialchars($_POST['tram']);
        if (!empty($tram)) 
        {
            $type_tram = substr($tram, 0, 1); //1 - TYPE DE TRAM UTILISÉ - toujours la premiere tram
            $objet = substr($tram, 1, 4); //4 - NUMERO D'EQUIPE - ne change jamais
            $requete = substr($tram, 5, 1); //1 - IDENTIFIE LA COMMANDE - modifie l'etat du capteur
            $type = substr($tram, 6,1); // 1 - LE TYPE DE CAPTEUR
            $numero = substr($tram, 7, 2); //2 - NUMERO DE CAPTEUR
            $valeur_capteur_hex = substr($tram, 9, 4); //4 - VALEUR DU CAPTEUR
            $date = substr($tram, 13, 4); // 4 - DATE

            insertdonnees($bdd, $valeur_capteur_hex, $date, $numero);
        }
        
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
            $type = $_GET['type'];
            include("vue/page_reglage_capteur.php");
        }


        elseif ($_GET['cible'] == 'reglage') // REGLAGE
        {
            include("vue/reglage.php");
        }
        elseif ($_GET['cible'] == 'securite') 
        {
            include("vue/insertion_valeur.php");
        }
        elseif ($_GET['cible'] == 'systeme') 
        {
            include("#");
        }
           elseif ($_GET['cible'] == 'cguA') 
        {
            include("vue/cguA.php");
        }
        elseif ($_GET['cible'] == 'cgu') 
        {
            include("vue/cgu.php");
        }
        elseif ($_GET['cible'] == 'edition_profil') // OK
        {
            include("vue/edition_profil.php");
        }
        elseif ($_GET['cible'] == 'contact') // CONTACT
        {
            include("vue/contact.php");
        }
        elseif ($_GET['cible'] == 'newsletter') 
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
