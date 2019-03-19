<?php
/**
 * Los de fouten op, zodat je de specifieke user kan zien met een lijstje van alle posts waarop deze gevote heeft
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
    <?php
    $sql = "SELECT * FROM `users` WHERE `id` = 17";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC); //fetch ipv fetchAll
    
    echo '<header><h1>' . $user['display_name'] . '</h1></header>';
    echo $user['about_me'];
    ?>
    <section>
      <header><h2>Votes by this user</h2></header>
      <?php
      $sql = "SELECT * FROM `votes` WHERE `user_id` = 17";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $votes = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      echo '<ul>';      
      foreach($votes as $vote) {
        echo '<li>';
        echo 'voted on post: ' . $vote['post_id'];
        echo '</li>';
      }
      echo '</ul>';
      ?>
    </section>
  </body>
</html>
