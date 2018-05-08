<?php

    session_start();

    $inactive = 900;    //valeur en secondes du temps avant deconnexion pour inactivite
    ini_set('session.gc_maxlifetime', $inactive); //initialisation de gc_maxlifetime
    //test de l'activite de l'utilisateur connecte
    if (isset($_SESSION['temps']) && (time() - $_SESSION['temps'] > $inactive)) {
        session_unset();
        session_destroy();
    }
    //id est le nom envoye par le formulaire de connexion
    if(isset($_GET['idjoueur'])){
        $_SESSION['idjoueur'] = $_GET['idjoueur'];
    }
    

    $pseudo = $_SESSION["login"];
    include 'id_connexion_bd.php';
    
    try{
        $bdd = new PDO ($db,$db_username,$db_password);
        $res = $bdd->query("INSERT INTO coup VALUES (1, " . $_SESSION['idjoueur'] . "," . $_POST['x'] . ",". $_POST['y'] .", " . time() . ")");



    } catch(PDOException $e){
        echo $e->getMessage();
    }

?>