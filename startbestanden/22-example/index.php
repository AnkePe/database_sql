<?php
/**
 * hier gaan we nog een stapje verder, en zetten we identieke stukken html apart
 */
include('database.php');

$title = 'Overview';
include('_top.php');
?>
<ol>
  <?php
  $sql = "SELECT * FROM `users` WHERE `website_url` != '' LIMIT 10";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($users as $user) {
   echo '<li>';
   echo '<a href="user-detail.php?id=' . $user['id'] . '">';
   echo $user['display_name'];
   echo '</a>';
   echo '</li>';
  }
  ?>
</ol>
<?php include('_bottom.php');?>
