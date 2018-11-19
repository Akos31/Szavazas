<?php 
require_once("db.php");
$nev = $_POST["name"];
$jelszo = $_POST["password"];

$db = new DB();

$sql = "SELECT * FROM felhasznalok WHERE nev = '" . $nev . "'";

 user = $db->queryGetOne( $sql );

$attempt = hash('sha256' , hex2bin($user["salt"]) . $jelszo);
if ($attempt === $user["jelszo"]) {
    echo "Sikeres belépés";
}
else {
    echo "Sikertelen belépés";
}
