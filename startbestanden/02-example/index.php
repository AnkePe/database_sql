<?php
/**
 * In dit voorbeeld halen we 10 users op uit de users tabel
 * en tonen we het resultaat mbv var_dump
 * > welk datatype heeft $users?
 * > welk datatype (volledig) heeft elk element in $users?
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
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Macoverflow</title>
  </head>
  <body>
    <pre>
      <?php
      $sql = "SELECT * FROM `users` LIMIT 10";  //query schrijven: we halen 10 users op uit de users tabel
      $stmt = $pdo->prepare($sql);    //$statement om de beschreven query te prepareren
      $stmt->execute();               //op het $statement object dat je terugkrijgt van de prepareftie, passen we de execute methode toe
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //$users is de results variabele
      // fetchAll als je x resultaten verwacht
      // fetch als je 1 resultaat verwacht
      // via argument kan je bepalen hoe je de resultaten terugkrijgt-> standaard is (PDO::FETCH_ASSOC)

      var_dump($users);
      ?>
    </pre>
  </body>
</html>
