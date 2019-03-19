<?php
/**
 * In dit voorbeeld halen we 1 specifieke user op
 * > wat is het verschil tussen lijn 30 hier en lijn 31 uit 02-example? fetch ipv fetchAll
 * > welk datatype heeft $user? array
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
      $sql = "SELECT * FROM `users` WHERE `id` = 8715";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC); //fetch ipv fetchAll
      var_dump($user);
      ?>
    </pre>
  </body>
</html>
