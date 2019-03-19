<?php
/**
 * Haal 20 posts op die een titel hebben
 * Toon de titels van deze posts in een lijstje
 */
$databaseHost = "localhost";
$databaseName = "stackoverflow";
$databaseUser = "stackuser";
$databasePassword = "stack";

$pdo = new PDO("mysql:host=" . $databaseHost . ";dbname=" . $databaseName, $databaseUser, $databasePassword);
$pdo->exec('SET CHARACTER SET utf8');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 8</title>
</head>
<body>
<ol>
<?php
$sql = "SELECT * FROM `posts` WHERE `title` != '' LIMIT 20";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo '<li>' . $post["body"] . '</li>';
}
?>
</ol>
    
</body>
</html>
