<?php
/**
 * Dit voorbeeld is qua functionaliteiten identiek aan het vorige
 * Om dubbele code te vermijden (database settings) staat dit in een apart bestand
 * We includen dit bestand op de paginas waar we een database connectie nodig hebben
 */
include('database.php');
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
   </body>
 </html>
