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
				<h1>Histoire du go </h1>




					<p>
					Le go est un jeu de plateau originaire de Chine. Il oppose deux adversaires qui placent à tour de rôle des pierres, respectivement noires et blanches, sur les intersections d'un tablier quadrillé appelé goban. Le but est de contrôler le plan de jeu en y construisant des « territoires ». Les pierres encerclées deviennent des « prisonniers », le gagnant étant le joueur ayant totalisé le plus de territoires et de prisonniers.

Il s'agit du plus ancien jeu de stratégie combinatoire abstrait connu, probablement créé en Chine pendant la période des Printemps et Automnes. Malgré son ancienneté, le go continue à jouir d'une grande popularité en Chine, en Corée et au Japon. Dans le reste du monde, où sa découverte est récente, sa notoriété est croissante. Son succès tient autant à la simplicité de ses règles qu'à sa grande richesse combinatoire et sa profondeur stratégique.

Le go dans sa forme actuelle a vu le jour au xve siècle au Japon, puis cette forme a été exportée en Chine et en Corée. En conséquence, la terminologie du jeu utilisée en Occident est principalement japonaise plutôt que chinoise . Le nom vient d'ailleurs du japonais igo (囲碁?) ou simplement go (碁?), le nom chinois étant wéiqí (围棋 / 圍棋) et le nom coréen baduk (바둑).<br/>
					</p>
					<p>
					La très longue histoire du go s'est déroulée pour une grande part dans des mondes clos et séparés : probablement créé en Chine pendant la période des Printemps et Automnes (771-453 av. J.-C.), il arriva en Corée puis au Japon au VIe siècle avec l'apport de la culture chinoise par les moines bouddhistes chan. Les contacts avec l'Occident au XIXe siècle, après l'ouverture militaire forcée du Japon par les navires noirs des États-Unis puis le Royaume-Uni en 1854, lui permirent enfin, avec le japonisme, d'arriver en Occident. C'est seulement depuis la fin du XXe siècle que le go commence à s'unifier sur le plan mondial.

					</p>
					<h2>Légendes des origines </h2>
<p>
Sur le plan historique, bien que le wéiqí soit très ancien, les datations qui lui attribuent plus de 4 000 ans d'histoire ne reposent que sur des récits légendaires que rien ne vient étayer – mais que beaucoup ont pris pour argent comptant. Seule certitude, le jeu fut inventé en Chine, bien avant notre ère. Son attribution à l'un ou l'autre des empereurs légendaires Yao ou Shun, chacun l'ayant utilisé pour l'éducation de son fils2,3, n'a aucun fondement historique. Pas plus d'ailleurs qu'une autre légende qui en attribue l'invention à un vassal nommé U, qui l'aurait imaginé pour distraire son suzerain sous le règne de Jie Gui, au XVIIe siècle av. J.-C.

Certains chercheurs voient dans l'art divinatoire chinois du Yi Jing de nombreuses analogies avec le wéiqí, qui pourrait en être le vecteur matériel5.
</p>
<h2> Premières attestations </h2>
<p>
On trouve les premières références écrites à un jeu qui pourrait être le go dans les Annales des Printemps et Automnes (entre 722 et 481 av. J.-C.). Plus tard, Confucius (551-479 av. J.-C.) mentionne le go dans ses Entretiens6.

Le jeu connaît un très fort développement avec l'apparition d'un système de classement des joueurs, d'instituts de go et de fonctionnaires. Les livres se multiplient : recueils de parties, écrits théoriques, listes de joueurs, etc. Des conseils stratégiques précis sont donnés dès le début de notre ère6 ; les premiers traités de go sont écrits à la fin de la dynastie Han (début du IIIe siècle). Le go est alors ajouté aux trois « arts sacrés » (peinture, musique et calligraphie) pratiqués par l'empereur et ses courtisans, pour devenir l'un des « quatre arts du lettré ». Il conserve ce statut jusqu'à la fin du XIXe siècle.

Dès la fin des Han et jusqu'à la restauration de l'empire par les Sui en 589, les classes dirigeantes sombrent dans le désœuvrement et se tournent vers le taoïsme et le go.
</p>
<h2>Arrivée du jeu au Japon </h2>
<p>
Le wéiqí arrive en Corée au Ve siècle et atteint enfin l'archipel nippon, où il est vite adopté par l'aristocratie locale, très influencée par la Chine. Selon la tradition, c'est en 735 que le go fut introduit au Japon, mais on trouve des interdictions déjà édictées plusieurs dizaines d'années plus tôt8. Par un décret de l'impératrice Jitō promulgué en 701, l'aristocratie s'arroge le droit d'y jouer. Les moines bouddhistes, auxquels on interdit la musique et les jeux de hasard, obtiennent le droit de jouer au go, qui n'est pas considéré comme un jeu de hasard9. Réservé à l'élite sociale, le go ne s'est cependant pas démocratisé au Japon avant le XXe siècle10.

La pratique du go se généralisera parmi les samouraïs comme entraînement à la stratégie militaire. À Kyoto, les moines nichirens (secte bouddhiste japonaise) seront les fondateurs de la maison Hon'inbō, la première grande école de go, qui demeurera ouverte jusqu'en 1940.

Au XVe siècle, une simple modification de règles va transformer profondément la pratique du jeu. On abolit la règle du zuozi qui consiste à placer une pierre dans chacun des quatre hoshi de coin du goban et on commence désormais la partie avec un goban entièrement vide. Le zuozi restera en vigueur en Chine jusqu'au début du XXe siècle, avant la réintroduction dans le pays de la règle japonaise, qui est la norme internationale aujourd'hui. Au Japon, le go est désormais libre pour les explorations théoriques sans entrave qui déboucheront sur le développement des joseki et des fuseki11.
</p>
<h2>Seconde Guerre mondiale </h2>
<p>

Le go continua son chemin malgré toutes les difficultés inhérentes à la Seconde Guerre mondiale. Une anecdote illustre bien la rage de jouer des professionnels du go.

Au printemps 1945, Iwamoto Kaoru devint challenger d'Hashimoto Utaro dans le prestigieux tournoi d’Honinbō. Jouer à Tokyo étant impensable après les terribles bombardements de mars 1945, il fut décidé que le match se déroulerait durant l'été à Hiroshima.

La première partie eut lieu les 23 et 25 juillet 1945, malgré l'interdiction de jouer signifiée aux joueurs par le chef de la police locale, qui craignait pour leur sécurité. Leur maison fut d'ailleurs mitraillée par l'aviation américaine durant la partie. Furieux d'apprendre qu'on avait enfreint ses ordres, le policier leur interdit formellement de rejouer dans la ville. Les adversaires tombèrent d'accord pour disputer la seconde partie du 4 au 6 août à Itsukaichi, dans la banlieue d'Hiroshima.

Au troisième jour du match, les joueurs faisaient une pause dans le jardin, lorsqu'ils aperçurent une explosion fulgurante suivie par la formation d'un gigantesque « champignon » et par un coup de vent violent qui brisa les fenêtres et renversa les meubles et la table de jeu. Comme ils en étaient au yose (fin de partie après les combats), ils replacèrent la position et terminèrent la partie, qui se finit par une victoire de Hashimoto avec cinq points d'avance. Ce ne fut que plus tard dans la journée, en voyant arriver les rescapés de la première bombe atomique, que les joueurs comprirent la tragédie à laquelle ils avaient miraculeusement échappé.

La confrontation se termina par un résultat nul (3-3) en novembre 1945, durant l'occupation américaine, après la reddition du Japon.
</p>
<h2> Diffusion en Occident </h2>
<p>
La découverte du go en Europe fut extrêmement tardive. Ce n'est qu'au XVIIe siècle qu'apparaissent les premières mentions du go. La première attestation écrite remonte à la traduction, publiée en 1615 à Augsbourg, du récit du séjour en Chine du jésuite Matteo Ricci19. Par la suite, les mentions du go se multiplient à travers l'Europe mais toujours assez brièvement dans des récits de voyage. Il faut attendre 1710 pour que Gottfried Wilhelm Leibniz rédige les premières considérations sur le go20,21.

Selon Franco Pratesi19, les premières descriptions du jeu étaient cependant trop sommaires pour que l'on puisse y jouer correctement. C'est seulement à la fin du XIXe siècle que le sinologue anglais Herbert Giles donne la première présentation utilisable des règles du go, ainsi que des conseils aux débutants (notamment celui d'utiliser un goban de 11×11).

À la même époque, l'Allemand Oskar Korschelt – qui a passé plusieurs années au Japon en tant que dentiste et a eu le 18e Honinbo, Shuo, comme patient22 – publie plusieurs articles puis un livre (Das japanisch-chinesisch Spiel ‘Go’ : ein Concurrent des Schach, 1881) qui auront un impact décisif sur la découverte du go : le jeu connaîtra alors ses premiers développements, principalement en Allemagne (en particulier à Leipzig) et en Autriche-Hongrie (à Vienne et Graz). Le premier club est créé en 1895 à Pola par des officiers de la marine austro-hongroise et la première revue, la Deutsche Go-Zeitung, naît à Vienne en 1909. Par la suite, le go prend racine à Berlin avec quelques joueurs célèbres (Max Lange, un homonyme du joueur d'échecs, Edward Lasker, Emanuel Lasker, etc.). En août 1924 se déroule à Munich le premier tournoi allemand.
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
