<?php
/**
 * Haal de post met id 14640 op
 * Toon de post title en de post body (is there a way to access Google Contacts using IPhone?)
 * Toon onder deze post een lijstje met alle comments op deze post (het zijn er een 30-tal)
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
    <title>Exercise 17</title>
  </head>
  <body>
    <?php
    $sql = "SELECT * FROM `posts` WHERE `id` = 14640";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC); //fetch ipv fetchAll
    
    echo '<header><h1>' . $post['title'] . '</h1></header>';
    echo $post['body'];
    ?>
    <section>
      <header><h2>Comments on this post:</h2></header>
      <?php
      $sql = "SELECT * FROM `comments` WHERE `post_id` = 14640";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      echo '<ol>';      
      foreach($comments as $comment) {
        echo '<li>';
        echo $comment['text'];
        echo '</li><br>';
      }
      echo '</ol>';
      ?>
    </section>
  </body>
</html>