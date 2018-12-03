<?php 
require_once("db.php");

$nev = $_POST["name"];
$email = $_POST["email"];
$jelszo = $_POST["password"];
$jelszo_megerosites = $_POST["password_conf"];

if (!$nev || !$email || !$jelszo || !$jelszo_megerosites) {
    echo 'Add meg az összes adatot!!!!';
}
if ( $jelszo !==$jelszo_megerosites) {
    echo 'A két jelszó nem egyezik meg!!!!';
}

$salt = openssl_random_pseudo_bytes(64);
$hash = hash('sha256',$salt  .  $jelszo);
$saltForDb = bin2hex($salt);
$sql = "INSERT INTO `felhasznalok` (`id`,`nev`,`email`,`jelszo`,`salt`) VALUES (NULL,'"
     . $nev ."',
     '" . $email . "',
     '" . $hash . "',
     '" . $saltForDb . "');";
echo $sql;

$db = new DB();

$db->update( $sql );

header('Location: fooldal.php');