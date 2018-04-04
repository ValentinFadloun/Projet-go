<?php

    
    $inactive = 900;    //valeur en secondes du temps avant deconnexion pour inactivite
    ini_set('session.gc_maxlifetime', $inactive); //initialisation de gc_maxlifetime


    session_start();    //demarage de la session


    //test de l'activite de l'utilisateur connecte
    if (isset($_SESSION['temps']) && (time() - $_SESSION['temps'] > $inactive)) {
        session_unset();
        session_destroy();
    }


    //id est le nom envoye par le formulaire de connexion
    if(isset($_GET['id'])){
        $_SESSION['id'] = $_GET['id'];
    }

    if(isset($_SESSION['id'])){
        
        //Affichage normal de la page.
        /*
            ici
        */

        
        $_SESSION['temps'] = time();     //actualisation de la dernière activite
    }
    //L'utilisateur n'a pas pu se connecter pour une raison indeterminee
    else {
        echo "Vous n'êtes pas connecté. <a href =\"index.php\">cliquez ici pour retourner sur la page d'accueil.</a>";
    }

?>