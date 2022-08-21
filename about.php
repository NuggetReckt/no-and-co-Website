<?php
require_once "assets/php/pager.php";
$pager = new Pager("A propos");

$pager->setHeader();
?>
            <div class="top-content" id="top-content-about">
                <div id="about">
                    <h1 id="pres">Prise de son - Montage son - Mixage</h1>
                </div>
            </div>
<?php
$pager->setFooter();
?>