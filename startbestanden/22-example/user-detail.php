<?php
include('database.php');

$title = 'User Detail';
include('_top.php');
?>
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
<?php include('_bottom.php');?>
