<?php
/**
 * Toon een lijst van 100 posts op deze overzichtspagina
 * - Deze moeten een titel hebben
 * - Deze zijn gesorteerd op last_activity_date (nieuwste bovenaan - tip: ORDER BY)
 * - Deze linken door naar post-detail.php en geven het id mee via de querystring
 *
 * Op de detailpagina toon je de post in een article tag:
 * - De titel van de post is de header
 * - De post body toon je ook
 *
 * Controleer in de detailpagina of er een geldig id werd meegegeven via de querystring
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

$title = 'Overview';
include('_top.php');
?>



<?php include('_bottom.php');?>
