<?php
require_once "assets/php/pager.php";
$pager = new Pager("Accueil");

$pager->setHeader();
?>
                <div id="top-title">
                    <h1>No&Co</h1>
                </div>
<?php
$pager->setFooter();
?>