<html>
<head>
    <title>Szavazás</title>
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
            <input type="submit" value="Regisztrálok!">
        </form>
    </div>
      <div>
        <h1>Bejelentkezés</h1>
        <?php
        session_start();
        if (isset($_SESSION['isLoginError'])) {
        	if ($_SESSION['isLoginError']) {
        		echo '
        		<div style="color:red; font-size: 20pt">
        			Rossz jelszó vagy felhasználónevet adtál meg!
        		    </div>';
        		    $_SESSION['isLoginError'] = false;
        	}
        }

         ?>
        <form method="post" action="login.php">
            <div>
                <label>Név</label>
                <input type="text" name="name">
            </div>
             <div>
                <label>Jelszó</label>
                <input type="password" name="password">
            </div>
            <input type="submit" value="Belépek!">
          </form>
             </div>

</body>
</html>