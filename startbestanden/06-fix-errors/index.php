<?php
/**
 * Los de fouten op, zodat je op deze pagina 10 comments op de post met id 14640 toont
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
      $sql = "SELECT * FROM `comments` WHERE `post_id` = 14640 LIMIT 10";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($comments as $comment) {
        echo '<li>';
        echo $comment['text']; //text ipv comment
        echo '</li>';
      }
      ?>
    </ol>
  </body>
</html>
