<?php
require_once "assets/php/panelpager.php";
require_once "assets/php/database/request.php";
$pager = new PanelPager("Nouveau Projet");

$pager->setHeader();

$request = new Request();

//Not working
/*if (!$request->isLogged) {
    header("Location: index.php");
}*/
?>
                <div class="form" id="project-form">
                    <form action="add_account.php" method="POST">
                        <fieldset>
                            <div class="form-content">
                                <h1>Créer un projet</h1>
                                <label>Nom du projet<br>
                                    <input type="text" name="project-name" class="input" placeholder="nom du projet" required="">
                                </label>
                                <br>
                                <label>URL vers le projet<br>
                                    <input type="url" name="project-link" class="input" placeholder="lien de redirection vers le projet" required="">
                                </label>
                                <br>
                                <label>Description du projet<br>
                                    <input type="text" name="project-desc" class="input"
                                           placeholder="" required="">
                                </label>
                                <br>
                                <label>
                                    <input type="date" name="date" class="input" required="">
                                </label>
                                <?php
                                require_once "assets/php/database/request.php";

                                if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password-confirm"])) {

                                    $username = $_POST["username"];
                                    $password = $_POST["password"];
                                    $password_confirm = $_POST["password-confirm"];

                                    $request = new Request();
                                    $request->create_account($username, $password, $password_confirm);
                                }
                                ?>
                                <br>
                                <input type="submit" value="Créer le compte">
                            </div>
                        </fieldset>
                    </form>
                </div>
<?php
$pager->setFooter();
?>