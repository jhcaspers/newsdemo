<?php
/**
 * NewsTicker Demo Project
 * Date: 15.07.2018
 * Time: 12:30
 */
require "NewsTicker.php";

$news = new \JhNewsTicker\NewsTicker();
$news->run();

?>
<!DOCTYPE html>
<html>
<head>
    <link href="./css/style.css" rel="stylesheet" />
</head>
<body>
<h3>Unser erster Newsticker</h3>
<div id="newsticker">
    <?php echo $news->getCurrentNews(); ?>
</div>
<div>Letzte Nachricht vom: <span id="lastmessagedate"><?php echo $news->getLastDate();?></span></div>
<div id="clockoutput"></div>
<script src="./js/jquery.js"></script>
<script src="./js/mynews.js"></script>
</body>
</html>

