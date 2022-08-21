<?php
require_once "assets/php/pager.php";
$pager = new Pager("Accueil");

$pager->setHeader();
?>
            <div class="top-content" id="top-content-index">
                <div id="top-title">
                    <img src="assets/images/logo.png" alt="logo" id="title-logo"><br>
                    <span id="headline">A l'écoute de vos images.</span><br>
                </div>
            </div>
            <div class="centered-content">
                <div id="discover">
                    <a href="about.php" id="discover-button">En savoir plus</a>
                </div>
            </div>
<?php
$pager->setFooter();
?>