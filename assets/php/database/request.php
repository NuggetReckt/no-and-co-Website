<?php

/**
 * @property string $username
 * @property string $password
 */

class Request
{
    function __construct()
    {
        require_once "connector.php";
    }

    function login($username, $password): void
    {
        session_unset();

        $this->username = $username;
        $this->password = $password;

        $req = "SELECT * FROM users WHERE username ='$username';";
        $req2 = "SELECT username FROM users;";

        $conn = new Connector();

        if (!($username == null && $password == null)) {
            $result = $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);
            $result2 = $conn->dbRun($req2, [])->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $i => $value) {
                $user_password = $value['password'];

                if ($password == $user_password) {
                    $_SESSION['user'] = $username;

                    sleep(1);
                    //echo "Mot de passe correct.";
                    header("Location: personal_space.php?logged");
                } else {
                    sleep(1);
                    //Mot de passe incorrect pour cet utilisateur
                    header("Location: login.php?error=1");
                    session_abort();
                }
            }

            foreach ($result2 as $i => $value) {
                $user_username = $value['username'];

                if ($username != $user_username) {
                    header("Location: login.php?error=1");
                    session_abort();
                }
            }
        } else {
            //Les champs ne peuvent pas être vides !
            header("Location: login.php?error=2");
            session_abort();
        }

        unset($username);
        unset($password);
        unset($user_password);
    }

    function get_projects(): void
    {
        $req = "SELECT * FROM projects ORDER BY date DESC;";
        $conn = new Connector();
        $result = $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $i => $value) {
            $link = $value['link'];
            $name = $value['name'];
            $desc = $value['description'];
            $date = $value['date'];

            echo "\n";
            echo "                <div class='project-content'>\n";
            echo "                    <a href='$link' target='_blank'>\n";
            echo "                        <h2 class='project-title'>$name</h2>\n";
            echo "                    </a>\n";
            //echo "                    <img class='project-img' src='/assets/images/test.jpg' alt='project-img'>\n";
            echo "                    <p class='project-desc'>$desc</p>\n";
            echo "                    <span class='project-date'>Sorti le $date</span>\n";
            echo "                    <hr>\n";
            echo "                </div>";
            echo "\n";
        }
    }

    function get_actus(): void
    {
        $req = "SELECT * FROM actus ORDER BY date DESC;";
        $conn = new Connector();
        $result = $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $i => $value) {
            $name = $value['name'];
            $desc = $value['description'];
            $date = $value['date'];

            echo "\n";
            echo "                <div class='actu-content'>\n";
            echo "                    <h2 class='actu-title'>$name</h2>\n";
            echo "                    <p class='actu-desc'>$desc</p>\n";
            echo "                    <span class='actu-date'>Le $date</span>\n";
            echo "                    <hr>\n";
            echo "                </div>";
            echo "\n";
        }
    }

    function get_musics(): void
    {
        $req = "SELECT * FROM musics ORDER BY date DESC;";
        $conn = new Connector();
        $result = $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $i => $value) {
            $link = $value['link'];

            echo "\n";
            echo $link;
            echo "\n";

            echo "$result";

            if ($result == null) {
                echo "\n";
                echo "<span>Aucun résultat.</span>";
                echo "\n";
            }
        }
    }
}