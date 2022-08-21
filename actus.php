<?php
require_once "assets/php/pager.php";
require_once "assets/php/database/request.php";
$pager = new Pager("Les actus");
$req = new Request();

$pager->setHeader();
?>
            <div class="actus">
                <?php $req->get_actus()?>
            </div>
<?php
$pager->setFooter();
?>