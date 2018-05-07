<html>
    <?php

        session_start();
        $login = $_SESSION["pseudo"];

        //$db_username = "vn934281";
        //$db_password = "vn934281";
        $db_username = "valentin";
        $db_password = "valentin";
        //en private html
        $db = "mysql:dbname=val;host=localhost";
        //en public html
      //  $db = "mysql:dbname=vn934281;host=172.31.21.41";

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

                function connexion($bdd, $pass, $pseudo) {

                    $req = $bdd->prepare("UPDATE inscrits SET motdepasse = ? WHERE pseudo= ? ");
                    $req->execute( array($pass, $pseudo) );
                    $res = $req->fetch(PDO::FETCH_OBJ);
                    if( $res ){
                        return $res;
                    }
                    else{
                        echo "identifiants invalide";
                    return false;
                    }
                }

                // si le formulaire de changement de mot de passe est soumis
                if(
                    ( isset($_POST['new_pass']) && !empty($_POST['new_pass']) &&
                    $_POST['new_pass'] === $_POST['conf_pass'] ) 

                ){
                    $newPass = $_POST['new_pass'];

                    // on exécute la fonction connexion
                    try
                    {
                    $res = connexion($bdd, $newPass, $login);
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
