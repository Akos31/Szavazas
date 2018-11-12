<?php
require_once("db.php");

$nev = $_POST["name"];
$email = $_POST["email"];
$jelszo = $_POST["password"];
$jelszo_megerosites = $_POST["password_conf"];
if (!$nev || !$email || !$jelszo || !$jelszo_megerosites) {
echo "Add meg az összes adatot";

}

if ($jelszo !== $jelszo_megerosites) {
	echo 'A jelszavak nem egyeznek meg';
}

$db = new DB();
$sql = "INSERT INTO `felhasznalok` (`id`, `nev`, `email`, `jelszo`, `salt`) VALUES (NULL, 
" . $nev . ", 
" . $email . ",
" . $jelszo . ",
 '')";

$db->query( $sql );

?>