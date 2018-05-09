<html>
    <?php

        include 'id_connexion_bd.php';

                session_start();
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

                function connection($bdd, $login, $pass) {

                    $req = $bdd->prepare("SELECT idjoueur, pseudo, motdepasse from INSCRITS WHERE pseudo= ? AND motdepasse= ?");
                    $req->execute( array($login,$pass) );
                    $user = $req->fetch(PDO::FETCH_OBJ);
                    if( $user ){
                        // on vérifie le mot de passe comme ça si tu utilises password_hash
                        // pour crypter les mots de passe

                      //  $verif = password_verify ( $pass , $user->password );

                        /*
                        if( $verif ){
                            // si c'est bon on return les info de l'utilisateur récup dans la table connection juste avant
                            echo('3');
                            return $user;
                        }
                        else {
                        }
                        */

                        return $user;
                    }
                    else{
                        echo "identifiants invalide";
                    return false;
                  }
                }
                function openSession($user){
                    // on rempli les sessions
                    $_SESSION["idjoueur"]  = $user->idjoueur;
                    $_SESSION["login"]  = $user->pseudo;
                }

                // si le formulaire de connexion est soumis
                if(
                    ( isset($_POST['pseudo']) && !empty($_POST['pseudo']) ) &&
                    ( isset($_POST['password']) && !empty($_POST['password']) )

                ){
                    $login = htmlspecialchars($_POST['pseudo']);
                    $pass = htmlspecialchars($_POST['password']);

                    // on exécute la fonction connection
                    try
                    {
                    $user = connection($bdd, $login, $pass);
                    }
                    catch(Exception $e)
                    {
                        echo ($e->getMessage());
                    }
                    // si la fonction connection retourne quelque chose
                    // ça veut dire que l'utilisateur existe et que le mot de
                    // passe renseigné dans le formulaire de connexion est le bon
                    if($user){
                        openSession($user);
                        header('Location: Accueil.php');
                    }
                }

    ?>
</html>
