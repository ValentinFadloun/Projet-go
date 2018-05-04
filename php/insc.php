<html>
	<head>
		<title> Login </title>
		<meta charset="UTF-8">
		<link href="../css/insc.css" rel="stylesheet" />
	</head>
	<body>
		<div class="mondiv">
			<header>
				<h2>Inscription</h2>
			</header>
			<div class="acc">
				<form action="inscription_rep.php" method="post">
					<label for="pseudo">
						Pseudo:
					</label>
					<input type="text" name="pseudo"/>
					<br/>
					<label for="mail">
						Mail :
					</label>
					<input type="text" name="mail"/>
					<br/>
					<label for="password">
						Mot de passe :
					</label>
					<input type="password" name="password"/>
					<br/>
						<a href="log.php">deja un compte ?, connectez vous</a>
					<p class="valider">
						<input type="submit" class="boutonValide">
					</p>
				</form>

			</div>
		</div>
	</body>
</html>
