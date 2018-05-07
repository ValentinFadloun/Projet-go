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
			<link rel='stylesheet' type='text/css' href='../css/Match.css' />

	</head>


		<div id='entete'>

				<img id='img_banniere' alt='banniere' src='../images/Banniere.jpg'/>

    </div>

        <body>
        <div id='corps'>
        	<div id= 'corps_droit'>
							<fieldset>
                <div id='creation'>
                  <!-- manque l'action du form -->

										<legend><h2>Creation de la partie</h2></legend>
                    <form action="Matchmaking_rep.php" method="post">

                          <br/>
                          <label for"nomPartie">Nom de la partie : </label>
                          <input type="text" name="nomPartie">
                          <br/><br/>
                          <input type="radio" id="public" name="confidentialite">
                          <label for="public">Public</label>
                          <br/>
                          <input type="radio" id="prive" name="confidentialite">
                          <label for="public">Privé</label>
                          <br/>
                          <p>Choix de la couleur des pions</p>
                          <input type="radio" id="pionAleatoire" name="choixPion">
                          <label for="pionAleatoire">Aléatoire</label>
                          <br/>
                          <input type="radio" id="pionBlanc" name="choixPion">
                          <label for="pionBlanc">Blanc</label>
                          <br/>
                          <input type="radio" id="pionNoir" name="choixPion">
                          <label for="pionNoir">Noir</label>
                          <br/><br/>
													<input type="text" id="invitation" name="invitation" placeholder="pseudo">
													<input type="button" id="inviter" name="inviter" value="Inviter ce joueur">
													<br/><br/>
                          <input type="submit" value="Creer">
                    </form>
                </div>
							</fieldset>
							<fieldset>
                <div id="recherche">
                          <input type="button" value="Parties en cours">
                          <input type="button" value="Parties finies">
                          <nav>
                            <ul>
                                <li>Link 1</li>
                                <li>Link 2</li>
                                <li>Link 3</li>
                                <li>Link 4</li>
                                <li>Link 5</li>
                                <li>Link 6</li>
                            </ul>
                        </nav>
                </div>
							</fieldset>
              </div>
								<div id='menu'>
										<ul>
											<li><a href="Matchmaking.php">Jouer</a></li>
											<li><a href="Accueil.php">Histoire du go</a></li>
											<li><a href="Accueil.php">Règles</a></li>
											<li><a href="Accueil.php">Profil</a></li>
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
		 echo "Vous n'êtes pas connecté. <a href =\"log.php\">cliquez ici pour retourner sur la page de connexion.</a>";
 }

?>
