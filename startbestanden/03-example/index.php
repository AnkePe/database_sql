<?php
/**
 * In dit voorbeeld halen we 10 users op uit de users tabel
 * en tonen we deze in een lijstje
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
    <ol>
      <?php
      $sql = "SELECT * FROM `users` LIMIT 10";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($users as $user) {
        echo '<li>';
        echo $user['display_name'] . ' - ' . $user['website_url'];
        echo '</li>';
      }
      ?>
    </ol>
  </body>
</html>
