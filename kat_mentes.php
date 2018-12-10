<?php 
session_start();

require_once("db.php");

$db = new DB();

$nev = $_GET["ujKatNev"];
if (!!$nev) {
	$sql = "INSERT INTO `kategoriak` (`id`, `nev`) VALUES (NULL, '" . $nev . "');";

	$db->update( $sql );
}


