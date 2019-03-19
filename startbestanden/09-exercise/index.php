<?php
/**
 * Haal alle posts op met een view_count boven de 10000
 * Toon de titels + deze view_count in een lijstje:
 * vb: What OS X Applications can't you live without? (view count: 10706)
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
    <title>Exercise 9</title>
</head>
<body>
<ol>
<?php
$sql = "SELECT * FROM `posts` WHERE `view_count` > 10000";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo '<li>' . $post["title"] . ' (viewcount: ' . $post["view_count"] . ') </li>';
}
?>
</ol>
    
</body>
</html>
