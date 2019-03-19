<?php
/**
 * In dit voorbeeld hebben we 2 paginas:
 * Deze pagina toont een lijstje met enkele users
 * Je kan op elke user doorklikken naar een detailpagina (user-detail.php)
 * Het id van de user wordt doorgegeven via de querystring (GET)
 * Op deze detailpagina zie je dan het user profiel.
 */

 $databaseHost = "localhost";
 $databaseName = "stackoverflow";
 $databaseUser = "stackuser";
 $databasePassword = "stackpass";

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
