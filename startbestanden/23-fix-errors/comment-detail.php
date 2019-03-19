<?php
include('database.php');

$title = 'Comment Detail';
include('_top.php');
?>
<?php
if (!isset($_GET['id'])) {
  $sql = "SELECT * FROM `comments` WHERE `id` = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $_GET['id']);
  $stmt->execute();
  $comment = $stmt->fetch(PDO::FETCH_ASSOC);
}
if (empty($comment)) {
  echo '<p>Deze comment kon niet gevonden worden</p>';
} else {
  echo '<dl>';
  foreach($comment as $col => $value) {
    echo '<dt>' . $col . '</dt>';
    echo '<dd>' . $value . '</dd>';
  }
  echo '</dl>';

  $sql = "SELECT * FROM `users` WHERE `id` = :user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $comment['user_id']);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  echo '<header><h2>Comment geplaatst door:</h2></header>';
  if (empty($user)) {
    echo '<dl>';
    foreach($user as $col => $value) {
      echo '<dt>' . $col . '</dt>';
      echo '<dd>' . $value . '</dd>';
    }
    echo '</dl>';
  }
}
?>
<?php include('_bottom.php');?>
