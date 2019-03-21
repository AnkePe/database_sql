<?php
include('database.php');

$title = 'User Detail';
include('_top.php');
?>
<?php   //eigenlijk niet nodig om alles in aparte php tags te zetten, kan allemaal in 1 php stuk
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
<?php include('_bottom.php');?>   
