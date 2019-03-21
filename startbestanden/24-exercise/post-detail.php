<?php
/**
 * Op de detailpagina toon je de post in een article tag:
 * - De titel van de post is de header
 * - De post body toon je ook
 *
 * Controleer of er een geldig id werd meegegeven via de querystring
 * - Indien er geen id werd meegegeven, of indien er geen post gevonden werd met dat id
 *   dan toon je een melding hiervan aan de gebruiker.
 * 
 * Op de detailpagina toon je ook de comments op de post
 * - Maak hiervoor een aparte section aan onder het post article
 * - Indien er geen comments geplaatst werden, dan toon je een melding hiervan
 * - Indien er wel comments zijn, dan toon je deze in een lijstje
 * - Ter info: op post met id 400 zou je 6 comments moeten zien
 */

include('database.php');
$title = 'Post Detail';
include('_top.php');
?>
<?php
//controle geldig id
if (isset($_GET['id'])) {
    $sql = "SELECT * from `posts` where `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
} 
//controle of post leeg is
if (empty($post)) {
    echo '<p>Deze post kon niet gevonden worden</p>';
} else {    //hier effe stoppen met php
    // var_dump($post);
?> 
<article>
<h2><?php echo $post['title']?></h2>   
<p><?php echo $post['body']?></p>
</article>
<section>
<h2>Comments:</h2>

<?php       //hier terug verder in php
$sql = "SELECT * from `comments` where `post_id` = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $post['id']);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($comments);

if (empty($comments)) {
    echo '<p>Er werden geen comments gevonden op deze post.</p>';
} else {
    echo '<ul>';
    foreach($comments as $comment) {
        echo '<li>' . $comment['text'] . '</li><br>';
    }
    echo '</ul>';
}
    
echo '</section>';
}
?>
<?php include('_bottom.php');?>