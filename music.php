<?php
require_once "assets/php/pager.php";
require_once "assets/php/database/request.php";
$pager = new Pager("Musiques");
$req = new Request();

$pager->setHeader();
?>
            <div class="top-content" id="top-content-musics">
                <div id="top-title">
                    <h1>Les Musiques</h1>
                    <span>Écoutez les musiques de </span><span style="color: #1394C3">No&Co</span><span> !</span>
                </div>
            </div>
            <div class="musics">
                <?php $req->get_musics()?>
            </div>
<?php
$pager->setFooter();
?>
