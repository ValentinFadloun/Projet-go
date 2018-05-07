<?php

    $inactive = 900;    //valeur en secondes du temps avant deconnexion pour inactivite
    ini_set('session.gc_maxlifetime', $inactive); //initialisation de gc_maxlifetime
    session_start();    //demarage de la session
    //test de l'activite de l'utilisateur connecte
    if (isset($_SESSION['temps']) && (time() - $_SESSION['temps'] > $inactive)) {
        session_unset();
        session_destroy();
    }
    if(isset($_SESSION['idjoueur'])){
        ?>


		<head>

			<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
			<script src="mapping_script.js"></script>
			<link rel='stylesheet' type='text/css' href='styles/style.css' />

		</head>

		<body onload="create_map()">
			<div id='entete'>

				<img id='img_banniere' alt='banniere' src='../images/Banniere.jpg' />

			</div>

			<div id='corps'>
				<div id='corps_droit'>
					<img class="imgA1" id="goban" src="SVG/grille.svg" alt="goban" usemap="#plateau"/>	
					<map name="plateau"/>

				</map>


				</div>


				<div id='menu'>
					<ul>
						<li><a href="Jouer.php">Jouer</a></li>
						<li><a href="Acceuil.php">Histoire du go</a></li>
						<li><a href="Acceuil.php">Règles</a></li>
						<li><a href="Acceuil.php">Profil</a></li>
					</ul>




					<br id='clear' />
				</div>

				<div id='enqueue'>
					<?php print_r($_SESSION) ?>
				</div>

				<script src="mapping_script.js"></script>
		</body>

<?php
 $_SESSION['temps'] = time();     //actualisation de la dernière activite
 }
 //L'utilisateur n'a pas pu se connecter pour une raison indeterminee
 else {
		 echo "Vous n'êtes pas connecté. <a href =\"Acceuil.php\">cliquez ici pour retourner sur la page d'accueil.</a>";
 }

?>
