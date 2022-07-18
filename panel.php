<?php
require_once "assets/php/panelpager.php";
require_once "assets/php/database/request.php";
$pager = new PanelPager("Menu");

$pager->setHeader();

$request = new Request();

//Not working
/*if (!$request->isLogged) {
    header("Location: index.php");
}*/
?>


<?php
$pager->setFooter();
?>
