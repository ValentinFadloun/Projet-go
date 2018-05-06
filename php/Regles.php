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
				<h1>Règles du go </h1>



<h2> Joueurs </h2>
					<p>
					Tout comme nombre de jeux de stratégie, le go oppose deux adversaires, Noir — qui joue toujours en premier — et Blanc, qui jouent leur tour successivement.

Lors de parties à handicap, le placement des pierres de handicap est le premier coup de Noir. Une fois que ces pierres sont posées, Blanc commence, mais en jouant ce qui est considéré comme le deuxième coup.
</p>

<h2> Matériel </h2>
<p>
Le tablier (碁盤 goban en japonais), traditionnellement en bois de kaya, est une grille de 19 lignes sur 19 rainurées formant 361 intersections. Les débutants jouent souvent sur des goban plus petits de 13×13 (169 intersections) ou 9×9 (81 intersections), sans autre aménagement des règles du jeu.

Les pierres (碁石 go-ishi en japonais) sont réparties en deux ensembles supposés infinis, mais en pratique limités à 181 pierres noires et 180 pierres blanches en forme de lentilles. Les pierres sont jouées sur les intersections libres du goban.

En général, les pierres sont rangées dans des bols (碁笥 go-ke en japonais) en bois, en plastique ou en osier, un par joueur. Le couvercle du bol est commode pour conserver les pierres capturées pendant la partie.
</p>	

<h2>Tirage au sort des couleurs</h2>
<p>
Quand les couleurs ne sont pas imposées, les joueurs déterminent lequel sera Noir par tirage au sort (en japonais nigiri3), une méthode traditionnelle notamment utilisée par les professionnels. Pour cela, un joueur prend un nombre quelconque de pierres blanches dans une main. Son adversaire essaie de deviner s'il s'agit d'un nombre pair ou impair : il pose deux pierres noires s'il estime que ce nombre est pair, une seule sinon. Le joueur dépose alors sa poignée sur le goban pour la compter. Si Noir a vu juste, il conserve sa couleur, sinon les joueurs échangent leur bol de pierres. Commencer est un avantage pour Noir, compensé par l'attribution à Blanc d'un certain nombre de points d'avance, le komi (6,5 points au Japon actuellement).
</p>

<h2>Tour de jeu </h2>
<p>
Au début de la partie, le goban est vide.

Pour une partie à handicap, le premier tour de Noir consiste en la pose des pierres de handicap.

Les joueurs déposent alternativement une pierre de leur couleur sur une intersection libre du goban (y compris les intersections qui se trouvent sur le bord extérieur de la grille). Une fois placée sur le goban, il n'est plus autorisé de déplacer une pierre. Un joueur peut aussi passer son tour ou abandonner.
	</p>
	
<h2>Pierres vivantes et mortes </h2>	
<p>
Lorsque des pierres sont dans une situation telle que leur capture est jugée inévitable, on dit qu'elles sont mortes. Au contraire, des pierres qui sont impossibles à capturer sont dites vivantes.

Un joueur n'a pas besoin de capturer réellement des pierres mortes, c'est-à-dire qu'il n'a pas besoin de rajouter tous les coups nécessaires pour retirer les pierres du plateau. Ces pierres mortes ne seront alors retirées du plateau qu'en fin de partie et ajoutées aux prisonniers.

Cette règle permettant de ne pas capturer « réellement » des pierres mortes pose un problème théorique, car il peut provoquer un litige entre les joueurs : un joueur peut considérer que certaines pierres sont mortes alors que son adversaire les considère, lui, comme vivantes. Ceci dépend notamment du niveau des joueurs, plus précisément de leur capacité à estimer correctement le statut d'un groupe. Toutefois, en cas de conflit, il suffit de continuer la partie jusqu'à ce que toutes les pierres jugées mortes par un joueur soient effectivement capturées ou que le conflit disparaisse, la situation se clarifiant aux yeux des joueurs.
</p>
<h2> Ko </h2>
<p>Pour éviter qu'une situation ne se répète à l'infini, la règle du ko (un mot japonais signifiant éternité4) interdit de jouer un coup qui ramènerait le jeu dans une position déjà vue dans le courant de la partie.

En réalité, la formulation qui précède n'est pas commune à toutes les règles, car elle s'applique le plus souvent quand une pierre vient juste d'être capturée et que la pierre qui l'a capturée n'a qu'une seule liberté (voir la figure ci-contre) ; le coup consistant à capturer cette pierre ramène alors à la situation de jeu immédiatement précédente. C'est cette configuration qu'on appelle un ko et c'est le seul cas de répétition qui est interdit par la règle japonaise. En règle française, par exemple, les autres cas possibles de configuration répétitive (très rares) sont également interdits (on parle de règle de superko), tandis qu'en règle japonaise, une telle répétition annule la partie (mushobu : en compétition, elle doit être rejouée).

En cas de ko, la recapture immédiate étant interdite, le joueur doit donc jouer ailleurs, ce qui crée un changement sur le goban. Ainsi, si l'autre joueur ne comble pas le ko, la capture devient à nouveau autorisée. Le ko a donc pour effet de rendre une situation locale (au voisinage du ko) fortement dépendante de la situation sur le reste du goban. Les deux joueurs, s'ils veulent gagner le ko, sont en effet amenés à jouer des coups forçant ailleurs sur le goban, jusqu'à ce que l'un des deux joueurs décide d'ignorer une menace ailleurs sur le goban pour pouvoir gagner la bataille de ko.
</p>

<h2>Fin de partie </h2>
<p>
Si aucun des joueurs n'a abandonné, la partie se termine après que les deux joueurs ont passé consécutivement. On comptabilise alors les points de chacun. Celui qui possède le plus de points gagne.

Les pierres mortes (qui restent sur le goban sans pouvoir éviter la capture) sont alors retirées comme si elles avaient été capturées. La règle stipule que les disputes sur le statut vivant ou mort des groupes peuvent être résolues en continuant à jouer jusqu'à ce que les joueurs tombent d'accord. Les règles japonaises ont ainsi une longue liste de précédents dans des parties de tournoi, mais cela reste anecdotique pour la plupart des joueurs. Après l'élimination des pierres mortes, on compte les points afin de déterminer le gagnant, c'est-à-dire celui qui occupe la plus grande partie du goban.

Il existe deux méthodes de comptage, qui désignent habituellement le même vainqueur (dans la majorité des parties, l'écart entre les deux décomptes n'est que d'un point).
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
