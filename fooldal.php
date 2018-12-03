<!DOCTYPE html>
<html>
<head>
	<title>Főoldal</title>

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
      <li class="nav-item active">
        <a class="nav-link" href="#">Kezdőlap </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Új kép feltöltése</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
        Képeim</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <div><?php
session_start();

if (isset($_SESSION["userData"])) {
	echo '
	<p>Belépve mint: ' . $_SESSION["userData"]["nev"] . '</p>
	';
}
?></div>
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Kilépés</button>
    </form>
  </div>
</nav>
</body>
</html>
