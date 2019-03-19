<?php
$databaseHost = "localhost";
$databaseName = "stackoverflow";
$databaseUser = "stackuser";
$databasePassword = "stackpass";

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
      <?php
      if (isset($_GET['id'])) {
        $sql = "SELECT * FROM `users` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
      }
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
