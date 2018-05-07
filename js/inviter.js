function invite()
{
  var pseudoJ2 = $("#invitation").val();
  $.ajax({
    type: 'POST',
    url: 'Matchmaking_rep.php',
    data : pseudoJ2,
    success: affiche
  });
}

function affiche(reponse)
{
  alert(reponse);
}
