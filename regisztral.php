<?php 
session_start();
require_once("db.php");

$nev = $_POST["name"];
$email = $_POST["email"];
$jelszo = $_POST["password"];
$jelszo_megerosites = $_POST["password_conf"];
$mindenJo = true;
if (!$nev || !$email || !$jelszo || !$jelszo_megerosites) {
	$_SESSION["miAHiba"] = "Adj meg minden adatot!!";
   $mindenJo = false;
}
if ( $jelszo !==$jelszo_megerosites) {
 	$mindenJo = false;
 	$_SESSION["miAHiba"] = "A két jelszó nem egyezik";
}
if ($mindenJo) {


$salt = openssl_random_pseudo_bytes(64);
$hash = hash('sha256',$salt  .  $jelszo);
$saltForDb = bin2hex($salt);
$sql = "INSERT INTO `felhasznalok` (`id`,`nev`,`email`,`jelszo`,`salt`) VALUES (NULL,'"
     . $nev ."',
     '" . $email . "',
     '" . $hash . "',
     '" . $saltForDb . "');";

$db = new DB();
$id = $db->updateReturnId( $sql );
if ($id) {
$sql = "SELECT * FROM felhasznalok WHERE id = '" . $id . "'";

$userData = $db->queryGetOne( $sql );
$_SESSION["userData"] = $userData;
header('Location: fooldal.php');
}
else {
header('Location: index.php');
}
}
else {
	header('Location: index.php');
}
