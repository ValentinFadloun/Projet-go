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

var couleur = "noir";

function put_stone(x, y) {

    var div = document.getElementById("corps_droit");
    var img_pierre = document.createElement("img");
    img_pierre.className = "imgB1";
    if (couleur == "noir") {
        img_pierre.src = "SVG/pion_noir.svg";
        img_pierre.alt = "pierre noire";
        couleur = "blanc";
        <?php include '../php/put_stone.php'; ?>
    } else if (couleur == "blanc") {
        img_pierre.src = "SVG/pion_blanc.svg";
        img_pierre.alt = "pierre blanche";
        couleur = "noir";
    }
    img_pierre.top = y;
    img_pierre.left = x;
    div.appendChild(img_pierre);
}
