<?php
require_once "assets/php/pager.php";
require_once "assets/php/database/request.php";
$pager = new Pager("Projets");
$req = new Request();

$pager->setHeader();
?>
            <div class="projects">
                <?php $req->get_projects()?>
            </div>
<?php
$pager->setFooter();
?>