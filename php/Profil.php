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
		$res = $bdd->query("SELECT pseudo, mail, partiesjouees, partiesgagnees from INSCRITS WHERE pseudo=". $pseudo . "' " );



	} catch(PDOException $e){
		echo $e->getMessage();
	}

    if(isset($_SESSION['idjoueur'])){ ?>

		<head>

			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
			<link rel="stylesheet" type="text/css" href="../css/Accueil.css" />

		</head>

		<body>
			<div id="entete">
				<img id="img_banniere" alt="banniere" src="../images/Banniere.jpg"/>
			</div>
		<div id="corps">
			<div id="corps_droit">
				<h1>Profil: </h1>

				<h2> Informations : </h2>

				<p>Pseudo: <?php echo $res['pseudo']; ?></p>

				<p>Adresse mail: <?php echo $res['mail']; ?></p>

				<h2> Statistiques :</h2>

				<p>Victoires: <?php echo $res['partiesgagnees'];?></p>

				<p>Defaites: <?php echo $res['partiesjouees'] - $res['partiesgagnees'};?></p>

				<p>Total: <?php echo $res['partiesjouees']?></p>
				</br></br>
				<form action="password_change.php" method="post" name="mdp_change">
					<h2><label>Changer de mot de passe:</label></h2></br>
					<label>Nouveau mot de passe: </label>
					<input name="new_pass" type="password" id="new_pass"/></br></br>
					<label>Confirmation: </label>
					<input name="conf_pass" type="password" id="conf_pass"/>
					<input name="submit_pass" type="submit"  id="submit_pass" value="Envoyer" />
				</form>

				</br></br>
				<form action="mail_change.php" method="post" name="mail_change">
					<h2><label>Changer d'adresse mail:</label></h2></br>
					<label>Nouveau mail: </label>
					<input name="new_mail" type="email" id="new_mail"/></br></br>
					<label>Confirmation: </label>
					<input name="conf_mail" type="email" id="conf_mail"/>
					<input name="submit_mail" type="submit"  id="submit_mail" value="Envoyer" />
				</form>
			</div>

			<div id="menu">
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
			<br/>
			</div>
		</div>

		<div id="enqueue">

		</div>

	<?php }else {?>
		 <p> Vous n'êtes pas connecté. <a href ="log.php">cliquez ici pour retourner sur la page d'accueil.</a></p>;
 <?php } ?>
