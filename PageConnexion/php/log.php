<html>
	<head>
		<title> Login </title>
		<meta charset="UTF-8">
		<link href="../css/log.css" rel="stylesheet" />
	</head>
	<body>
		<div class="mondiv">
			<header>
				<h2>Connexion</h2>
			</header>
			<div class="acc">
				<form action="log_rep.php" method="post">
					<label for="pseudo">
						Pseudo :
					</label>
					<input type="text" name="pseudo"/>
					<br/>
					<label for="password">
						Mot de passe :
					</label>
					<input type="password" name="password"/>
					<br/>
					<br/>
						<a href="../../PageInscription/php/insc.php">Vous n'avez pas de compte ?, inscrivez vous</a>
					<p class="valider">
						<input type="submit" class="boutonValide"/>
					</p>
				</form>
			</div>
		</div>
	</body>
</html>
