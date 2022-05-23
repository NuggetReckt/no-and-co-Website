<?php
require_once "assets/php/pager.php";
$pager = new Pager("Accueil");

$pager->setHeader();
?>
                <div id="top-title">
                    <img src="assets/images/logo.png"><br>
                    <span>A l'écoute de vos images.</span>
                </div>
<?php
$pager->setFooter();
?>