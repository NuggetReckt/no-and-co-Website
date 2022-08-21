<?php
require_once "assets/php/pager.php";
require_once "assets/php/psutils.php";
$pager = new Pager("Espace Personnel");
$psutils = new PsUtils();

$pager->setPersonalSpaceHeader();

session_start();
if ($_SESSION['user'] == null) {
    header("Location: login.php?error=3");
}
if (isset($_GET['logged'])) {
    $username = $_SESSION['user'];

    echo "<div class='pop-up-message' id='pop-up-success'>";
    echo "    <span>Connecté avec succès. Bienvenue, $username</span>\n";
    echo "</div>";
}

/*if (isset($_GET['error'])) {
    $err = $_GET['error'];

    if ($err == 5) {
        echo "            <div class='pop-up-message' id='pop-up-fail'>\n";
        echo "                <span>Les fichiers sont inexistants ou le dossier n'existe pas. Veuillez contacter un administrateur.</span>\n";
        echo "            </div>\n";
    }
}*/
?>
            <div class="top-content" id="top-content-ps">
                <div>
                    <?php
                    $psutils->get_files();
                    ?>
                </div>
            </div>
<?php
$pager->setFooter();
?>