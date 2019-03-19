<?php
/**
 * In dit voorbeeld halen we 1 specifieke user op en tonen we enkele velden van deze user
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
    <dl>
      <?php
      $sql = "SELECT * FROM `users` WHERE `id` = 2";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      echo '<dt>name:</dt>';
      echo '<dd>' . $user['display_name'] . '</dd>';
      echo '<dt>website:</dt>';
      echo '<dd>' . $user['website_url'] . '</dd>';
      echo '<dt>about me:</dt>';
      echo '<dd>' . $user['about_me'] . '</dd>';
      ?>
    </dl>
  </body>
</html>
