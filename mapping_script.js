//Création des points servant de lien pour placer les pions sur le goban
function create_map() {

    var plateau_de_jeu = document.getElementById("goban");
    var map_jeu = document.getElementsByTagName("map")[0];

    var i = 0;
    var j = 0;

    var cote = plateau_de_jeu.width;

    for (i = 0; i <= cote; i += 50) {
        for (j = 0; j <= cote; j += 50) {
            var area = document.createElement("area");
            area.shape = "circle";
            area.coords = j + "," + i + ",10";
            //area.href = "https://www.google.com";
            area.href = "javascript:put_stone(" + j + "," + i + ");";
            map_jeu.appendChild(area);
        }
    }
}

var couleur = "noir";

function put_stone(x, y) {

    var img_pierre = document.createElement("img");
    img_pierre.className = "imgB1";
    if (couleur == "noir") {
        img_pierre.src = "SVG/pion_noir.svg";
        img_pierre.alt = "pierre noire";
        couleur = "blanc";
    } else if (couleur == "blanc") {
        img_pierre.src = "SVG/pion_blanc.svg";
        img_pierre.alt = "pierre blanche";
        couleur = "noir";
    }
    img_pierre.top = y;
    img_pierre.left = x;
    alert(couleur);
    document.appendChild(img_pierre);

    return false;
}