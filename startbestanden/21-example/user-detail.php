<?php
include('database.php');
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
