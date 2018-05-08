//Création des points servant de lien pour placer les pions sur le goban
function create_map() {

    var plateau_de_jeu = document.getElementById("goban");
    var map_jeu = document.getElementsByTagName("map")[0];

    var i = 0;
    var j = 0;

    var cote = plateau_de_jeu.width;
    var taille_case = cote / 18;

    for (i = 0; i <= cote; i += taille_case) {
        for (j = 0; j <= cote; j += taille_case) {
            var area = document.createElement("area");
            area.shape = "circle";
            area.coords = j + "," + i + ",10";
            //area.href = "https://www.google.com";
            area.href = "javascript:put_stone(" + j + "," + i + ");";
            map_jeu.appendChild(area);
        }
    }
}

function creerInstance(){
    if(window.XMLHttpRequest){
      // Firefox, Opera, Google Chrome
      return new XMLHttpRequest();
    }else if(window.ActiveXObject){
      / Internet Explorer /
      var names = [
        "Msxml2.XMLHTTP.6.0",
        "Msxml2.XMLHTTP.3.0",
        "Msxml2.XMLHTTP",
        "Microsoft.XMLHTTP"
      ];
      for(var i in names){
        / On test les différentes versions /
        try{ return new ActiveXObject(names[i]); }
        catch(e){}
      }
      alert("Non supporte");
      return null; // non supporté
    }
  };

  function envoyerDonnees (x, y){
    var req =  creerInstance();

    var conf = "x=" + x + "y=" + y;

    req.onreadystatechange = function(){
    / Si l'état = terminé /
        if(req.readyState == 4){
            / Si le statut = OK /
            if(req.status == 200){
            / On affiche la réponse /
            alert(req.responseText);
            }else{
            alert("Error: returned status code " + req.status + " " + req.statusText);
            }
        }
    }

    req.open("POST", "../Jeu/put_stone.php", true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    /* Pour la commande POST les données sont mises dans le corps du message
        et donc passées en argument dans la fonction send */
    req.send(conf);
  }

var couleur = "noir";

function put_stone(x, y) {

    var div = document.getElementById("corps_droit");
    var img_pierre = document.createElement("img");

    img_pierre.className = "imgB1";
    img_pierre.src = "SVG/pion_noir.svg";
    img_pierre.alt = "pierre noire";
    img_pierre.top = y;
    img_pierre.left = x;
    
    div.appendChild(img_pierre);

    envoyerDonnees(x, y);
}