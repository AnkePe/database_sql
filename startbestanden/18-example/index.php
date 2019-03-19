<?php
/**
 * In dit voorbeeld maken we gebruik van een prepared statement om een variabele waarde in een query te gebruiken
 */

$databaseHost = "localhost";
$databaseName = "stackoverflow";
$databaseUser = "stackuser";
$databasePassword = "stackpass";

$pdo = new PDO("mysql:host=" . $databaseHost . ";dbname=" . $databaseName, $databaseUser, $databasePassword);
$pdo->exec("SET CHARACTER SET utf8");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$id = 2;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Macoverflow</title>
  </head>
  <body>
      <?php
      $sql = "SELECT * FROM `users` WHERE `id` = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if (empty($user)) {
        echo '<p>Deze gebruiker kon niet gevonden worden</p>';
      } else {
        echo '<dl>';
        foreach($user as $col => $value) {
          echo '<dt>' . $col . '</dt>';
          echo '<dd>' . $value . '</dd>';
        }
        echo '</dl>';
      }
      ?>
  </body>
</html>
