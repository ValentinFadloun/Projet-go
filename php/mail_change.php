<html>
    <?php

        session_start();
        $login = $_SESSION["pseudo"];

        include 'id_connexion_bd.php';

                try{
                // création de l'objet PDO pour se connecter à la base de données
                $bdd = new PDO ($db,$db_username,$db_password);
                }
                catch(PDOException $e)
                {
                    echo ($e->getMessage());
                }
                /*
                Vérification si l'utilisateur existe.
                Si oui, on vérifie que le password reçu par le formulaire est le bon
                */

                function connexion($bdd, $mail, $pseudo) {

                    $req = $bdd->prepare("UPDATE inscrits SET mail = ? WHERE pseudo= ? ");
                    $req->execute( array($mail, $pseudo) );
                    $res = $req->fetch(PDO::FETCH_OBJ);
                    if( $res ){
                        return $res;
                    }
                    else{
                        echo "identifiants invalide";
                        return false;
                    }
                }

                // si le formulaire de changement de mail est soumis
                if(
                    ( isset($_POST['new_mail']) && !empty($_POST['new_mail']) &&
                    $_POST['new_mail'] === $_POST['conf_mail'] ) 

                ){
                    $newMail = htmlspecialchars($_POST['new_mail']);

                    // on exécute la fonction connexion
                    try
                    {
                    $res = connexion($bdd, $newMail, $login);
                    }
                    catch(Exception $e)
                    {
                        echo ($e->getMessage());
                    }
                    // si la fonction connection retourne quelque chose
                    // ça veut dire que l'utilisateur existe et que le mot de
                    // passe renseigné dans le formulaire de connexion est le bon
                    if($res){
                        echo "Mot de passe changé";
                        header('Location: Profil.php');
                    }
                }

    ?>
</html>
