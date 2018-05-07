<?php

session_start();

include 'id_connexion_bd.php';
$joueur1 = $_SESSION['idjoueur'];
//$joueur2 = $_POST['pseudoJ2'];
//requete sql pour enregistrer le nouvel inscrit
//echo $_SESSION['idjoueur'];
//header('Content-Type : text/plain');
//echo $joueur2;
$joueur2= 2;
$requete = "INSERT INTO JOUE VALUES (0,$joueur1,$joueur2,'en cours');";

try{
 $conn = new PDO($db,$db_username,$db_password);
}
catch(PDOException $e)
{
    echo ($e->getMessage());
}
//rajouter aussi qu'il faut un autre joueur
if(isset($_POST['nomPartie']) && isset($_POST['confidentialite']) && isset($_POST['choixPion']))
{
  if ($conn->query($requete) == TRUE) {
      header('Location: ../Jeu/Jouer.php');
  } else {
  //    echo "Error: " . $requete . "<br>" ;
      echo "joueur 2 n'existe pas";
  }

}


 ?>
