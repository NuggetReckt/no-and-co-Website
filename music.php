<?php
require_once "assets/php/pager.php";
$pager = new Pager("Accueil");
$req = new Request();

$pager->setHeader();
?>

<div class="top-content" id="top-content-musics">
    <div id="top-title">
        <h1>Les musiques</h1>
        <span>Découvrez les musiques de </span><span style="color: #1394C3">No&Co</span><span> !</span>
    </div>
</div>
<div class="musics">
    <?php $req->get_musics()?>
</div>

<?php
$pager->setFooter();
?>
