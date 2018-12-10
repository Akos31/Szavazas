<html>
<head>
  <title>Kategóriák</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Szavazás</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="fooldal.php">Kezdőlap </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Új kép feltöltése</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
        Képeim</a>
      </li>
      <?php
      session_start();
      if ($_SESSION["userData"]["jogosultsag"] === "3") {
        echo '<li class="nav-item">
        <a class="nav-link active" href="#">
        Kategóriák</a>
      </li>';
      }
      ?>
    </ul>
     <div>
<?php

if (isset($_SESSION["userData"])) {
  echo '
  <p style="margin-right: 10px; margin-top: 8px; font-style: italic">Belépve mint: ' . $_SESSION["userData"]["nev"] . ',
   jogosultság: ' . getPermission($_SESSION["userData"]["jogosultsag"]) . '</p>' ;
}

function getPermission($szam) {
  if ($szam === '1') {
    return "fotós";
  }
    else if ($szam === '2') {
      return "zsűri";
    }
  
    return "admin";
    
}
?>
  
</div>
    <form class="form-inline my-2 my-lg-0" action="/logout.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Kilépés</button>
    </form>
  </div>
</nav>
<div style="padding: 1%">
<?php
require_once("kategoria_oldal.php");
 ?> 
</div>
</body>
<script type="text/javascript">
  function inputLegyen() {
    let form = document.getElementById("inputForm");
    form.style.display = "block";
    let ujgomb = document.getElementById("ujGomb");
    ujgomb.style.display = "none";
  }

  function mentettem() {
 let form = document.getElementById("inputForm");
    form.style.display = "none";
    let ujgomb = document.getElementById("ujGomb");
    ujgomb.style.display = "block";
  }
</script>
</html>
