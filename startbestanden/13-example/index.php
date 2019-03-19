<?php
/**
 * In dit voorbeeld tonen we een fout wanneer we een user proberen op te halen die niet bestaat
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
    $sql = "SELECT * FROM `users` WHERE `id` = -10";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump ($user);
    if (empty($user)) {
      echo '<p>Deze gebruiker kon niet gevonden worden</p>';
    }
    ?>
  </body>
</html>
