<?php
require_once "panel-assets/php/pager.php";
require_once "assets/php/database/request.php";
$pager = new AppPager("Menu");

$pager->setHeader();

$request = new Request();

if (!$request->isLogged) {
    header("Location: index.php");
}
?>


<?php
$pager->setFooter();
?><?php
