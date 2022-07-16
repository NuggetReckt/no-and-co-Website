<?php
require_once "assets/php/pager.php";
$pager = new Pager("Login");

$pager->setHeader();
?>
                <div class="form" id="login-form">
                    <form action="login.php" method="POST">
                        <fieldset>
                            <div class="form-content">
                                <h1>Connection</h1>
                                <?php
                                require_once "assets/php/database/request.php";

                                if (isset($_POST["username"]) && isset($_POST["password"])) {

                                    $username = $_POST["username"];
                                    $password = $_POST["password"];

                                    $request = new Request();
                                    $request->login($username, $password);
                                }
                                ?>
                                <label>Nom d'utilisateur<br>
                                    <input type="text" name="username" class="input" placeholder="nom d'utilisateur" required="">
                                </label>
                                <br>
                                <label>Mot de Passe<br>
                                    <input type="password" name="password" class="input" placeholder="mot de passe" required="">
                                </label>
                                <br>
                                <input type="submit" value="Login">
                            </div>
                        </fieldset>
                    </form>
                </div>
<?php
$pager->setFooter();
?>