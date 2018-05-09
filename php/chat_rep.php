<html>
<?php
  session_start();
  print_r($_SESSION);
  $mess = htmlspecialchars($_POST["message"]);
//  echo  $mess;
 header('Location: Acceuil.php');
 ?>
</html>
