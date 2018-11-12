<!DOCTYPE html>
<html>
<head>
	<title>Szavaz</title>
</head>
<body>
<div>
	<h1>Regisztráció</h1>
	<form method="post" action="regisztral.php">
		<div>
		<label>Név</label>
		<input type="text" name="name">
		</div>
		<div>
		<label>Email</label>
		<input type="email" name="email">
		</div>
		<div>
		<label>Jelszó</label>
		<input type="password" name="password">
		</div>
		<div>
		<label>Jelszó megerősítése</label>
		<input type="password" name="password_conf">
		</div>
		<input type="submit">
	</form>
  </div>
</body>
</html>