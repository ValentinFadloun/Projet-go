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
    if(isset($_GET['idjoueur'])){
        $_SESSION['idjoueur'] = $_GET['idjoueur'];
    }
    if(isset($_SESSION['idjoueur'])){

        //Affichage normal de la page.
        ?>
        <head>

			<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
			<link rel='stylesheet' type='text/css' href='../css/Accueil.css' />

	</head>

	<body>
		<div id='entete'>

				<img id='img_banniere' alt='banniere' src='../images/Banniere.jpg'/>

		</div>

		<div id='corps'>
						<div id='corps_droit'>


				<h1>Profil </h1>
<h2> Informations :</h2>
<p>Pseudo:
</p>
<p>Adresse mail:
</p>
<h2> Statistiques :</h2>
					<p>
				Classement:
					</p
				Temps total joué:
					<p>
					</p>

				<p>
				Victoires:
					</p>
				<p>
				Defaites:
					</p>
					<p>
				Total:
					</p>
					<p>
				Serie de victoires:
					</p>					
					<p>
				Serie de defaites:
					</p>


			</div>

			<div id='menu'>
<ul>
  <li><a href="Matchmaking.php">Jouer</a></li>
  <li><a href="Accueil.php">Histoire du go</a></li>
  <li><a href="Regles.php">Règles</a></li>
  <li><a href="Profil.php">Profil</a></li>
  <li><a href="deconnexion.php">Deconnexion</a></li>
</ul>





<div id="wrapper">

    <div id="chatbox"></div>
     
    <form action="chat_rep.php" method="post" name="message">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Envoyer" />
    </form>
</div>	



			<br id='clear'/>
		</div>
		</div>

		<div id='enqueue'>

		</div>
	</body>

   <?php
    $_SESSION['temps'] = time();     //actualisation de la dernière activite
    }
    //L'utilisateur n'a pas pu se connecter pour une raison indeterminee
    else {
        echo "Vous n'êtes pas connecté. <a href =\"connexion.php\">cliquez ici pour retourner sur la page de connexion.</a>";
    }

?>
