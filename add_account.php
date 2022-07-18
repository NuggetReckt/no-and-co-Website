<?php
require_once "assets/php/panelpager.php";
require_once "assets/php/database/request.php";
$pager = new PanelPager("Nouveau Compte");

$pager->setHeader();

$request = new Request();

//Not working
/*if (!$request->isLogged) {
    header("Location: index.php");
}*/
?>
                <div class="form" id="create-form">
                    <form action="add_account.php" method="POST">
                        <fieldset>
                            <div class="form-content">
                                <h1>Créer un compte administrateur</h1>
                                <label>Nom d'utilisateur<br>
                                    <input type="text" name="username" class="input" placeholder="nom d'utilisateur" required="">
                                </label>
                                <br>
                                <label>Mot de passe<br>
                                    <input type="password" name="password" class="input" placeholder="mot de passe" required="">
                                </label>
                                <br>
                                <label>Confirmation du mot de passe<br>
                                    <input type="password" name="password-confirm" class="input"
                                           placeholder="confirmer le mot de passe" required="">
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