<?php
require_once "assets/php/pager.php";
$pager = new Pager("Accueil");

$pager->setHeader();
?>
                <div id="top-title">
                    <img src="assets/images/logo.png">
                </div>
<?php
$pager->setFooter();
?>