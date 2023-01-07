<?php
require_once "assets/php/pager.php";
require_once "assets/php/database/request.php";
$pager = new Pager("Les actus");
$req = new Request();

$pager->setHeader();
?>
            <div class="top-content" id="top-content-actus">
                <div id="top-title">
                    <h1>Les Actus</h1>
                    <span>Tenez vous à jour des nouveautés de </span><span style="color: #1394C3">No&Co</span><span> !</span>
                </div>
            </div>
            <div class="actus">
                <?php $req->get_actus()?>
            </div>
<?php
$pager->setFooter();
?>