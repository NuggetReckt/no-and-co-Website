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

        $conn = new Connector();
        $mysqli = $conn->mysqli;

        $req = "SELECT * FROM users WHERE username ='$username';";
        $req2 = "SELECT username FROM users;";

        if (!($username == null && $password == null)) {

            $result = $mysqli->query($req, MYSQLI_USE_RESULT);

            while ($row = mysqli_fetch_assoc($result)) {
                $user_password = $row['password'];

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

            $result2 = $conn->mysqli->query($req2, MYSQLI_USE_RESULT);

            while ($row = mysqli_fetch_assoc($result2)) {
                $user_username = $row['username'];

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
        $mysqli = $conn->mysqli;

        $result = $mysqli->query($req, MYSQLI_USE_RESULT);

        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $link = $row['link'];
            $desc = $row['description'];
            $date = $row['date'];

            echo "\n";
            echo "                <div class='project-content'>\n";
            echo "                    <a href='$link' target='_blank'>\n";
            echo "                        <h2 class='project-title'>$name</h2>\n";
            echo "                    </a>\n";
            //echo "                    <img class='project-img' src='/assets/images/test.jpg' alt='project-img'>\n";
            echo "                    <p class='project-desc'>$desc</p>\n";
            echo "                    <span class='project-date'>$date</span>\n";
            echo "                    <hr>\n";
            echo "                </div>";
            echo "\n";
        }
    }

    function get_actus(): void
    {
        $req = "SELECT * FROM actus;";

        $conn = new Connector();
        $mysqli = $conn->mysqli;

        $result = $mysqli->query($req, MYSQLI_USE_RESULT);

        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $desc = $row['description'];
            $date = $row['date'];

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
        $req = "SELECT * FROM musics;";

        $conn = new Connector();
        $mysqli = $conn->mysqli;

        $result = $mysqli->query($req, MYSQLI_USE_RESULT);

        while ($row = mysqli_fetch_array($result)) {
            $link = $row['link'];

            echo $link;
        }
    }
}