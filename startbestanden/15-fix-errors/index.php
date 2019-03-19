<?php
/**
 * Los de fouten op, zodat je een specifieke comment kan zien
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
    <h1>Comment</h1>
    <?php
    $sql = "SELECT * FROM `comments` WHERE `id` = 33";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);  //fetch ipv fetchAll
    echo $comment['text'];
    ?>
  </body>
</html>
