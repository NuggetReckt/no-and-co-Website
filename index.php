<?php
require_once "assets/php/pager.php";
$pager = new Pager("Accueil");

$pager->setHeader();
?>
                <div class="top-content">
                    <div id="top-title">
                        <img src="assets/images/logo.png" alt="logo"><br>
                        <span>A l'écoute de vos images.</span>
                    </div>
                </div>
<?php
$pager->setFooter();
?>