<?php
require_once "assets/php/pager.php";
$pager = new Pager("Projets");

$pager->setHeader();

require_once "assets/php/utils.php";
$projects = new Utils();
$projects->Project("Hello, World", "https://play.noskillworld.fr", "ceci est une description.", "31", "04", "2022");
?>


<?php
$pager->setFooter();
?>