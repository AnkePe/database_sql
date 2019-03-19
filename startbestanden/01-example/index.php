<?php
/**
 * In dit voorbeeld wordt een connectie gemaakt met de database
 * De logingegevens moeten uiteraard overeen komen met die van de
 * User account die je zopas aanmaakte in phpMyAdmin
 * Je zou een wit scherm moeten zien.
 */

$databaseHost = "localhost";
$databaseName = "stackoverflow";
$databaseUser = "stackuser";
$databasePassword = "stack";

$pdo = new PDO("mysql:host=" . $databaseHost . ";dbname=" . $databaseName, $databaseUser, $databasePassword);
$pdo->exec("SET CHARACTER SET utf8");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
