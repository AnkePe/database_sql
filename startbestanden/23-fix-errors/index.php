<?php
/**
 * Los de errors op, zodat je:
 * > op deze overzichtspagina 10 comments ziet staan
 * > je kan doorklikken naar de detail pagina van een comment
 * > op deze detailpagina alle metadata van de comment kan zien
 * > op de detailpagina ook de user info kan zien (die de comment geplaatst heeft)
 */
include('database.php');

include('_top.php');
?>
<ol>
  <?php
  $sql = "SELECT * FROM `comments` LIMIT 10 WHERE `score` > 0";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($comments as $comment) {
   echo '<li>';
   echo '<a href="comment.php?id=' . $comments['id'] . '">';
   echo $comments['text'];
   echo '</a>';
   echo '</li>';
  }
  ?>
</ol>
<?php include('_bottom.php');?>
