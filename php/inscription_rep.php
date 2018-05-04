<html>
    <?php
        //booleen qui sert pour les verifs
        $ok= true;
        //recuperation des donnees dans des variables
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];
        //parametres de connexion à la base de données
        $db_username = "valentin";
        $db_password = "valentin";
        //en private html
        $db = "mysql:dbname=val;host=localhost";
        //en public html
      //  $db = "mysql:dbname=vn934281;host=172.31.21.41";
        //requete sql pour enregistrer le nouvel inscrit
        $requete = "INSERT INTO INSCRITS VALUES (0,\"$mail\",\"$pseudo\",\"$password\",0,0);";

       try{
        $conn = new PDO($db,$db_username,$db_password);
       }
       catch(PDOException $e)
       {
           echo ($e->getMessage());
       }

           //verifie si l'email est valide
           if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
           {
             //contient le message d'alerte au cas où il y aurait une erreur lors de l'inscription
             echo "format email invalide <br>";
             //modifie le booleen car il y a une erreur
             $ok = false;
           }
           //verifie si le mot de passe est suffisament long (7 caracteres min)
           if(strlen($password)<7)
           {
               echo "mot de passe trop faible, veuillez mettre au minimum 7 caracteres <br>";
               $ok = false;
           }
           //si il y a une erreur, c'est que la bd refuse l'insertion, le seul refus possible est l'utilisation d'un meme pseudo
           if($ok == true)
           {
                //va à la page de connexion si la requete est bonne
                if ($conn->query($requete) == TRUE) {
                    header('Location: log.php');
                } else {
                //    echo "Error: " . $requete . "<br>" ;
                    echo "pseudo deja pris";
                }
           }
    ?>

</html>
