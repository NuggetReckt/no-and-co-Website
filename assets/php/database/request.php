<?php

/**
 * @property $username
 * @property $password
 * @property $password_confirm
 * @property $name
 * @property $link
 * @property $desc
 * @property $date
 */
class Request
{
    public bool $isLogged = false;

    function __construct()
    {
        require_once "connector.php";
    }

    function login($username, $password): void
    {
        $this->username = $username;
        $this->password = $password;

        $conn = new Connector();
        $req = "SELECT password FROM users WHERE username ='$username'";

        $result = $conn->mysqli->query($req, MYSQLI_USE_RESULT);

        while ($row = mysqli_fetch_assoc($result)) {
            $user_password = $row['password'];

            if ($password == $user_password) {
                $this->isLogged = true;
                //echo "Mot de passe correct.";

                sleep(1);
                header("Location: panel.php");
            } else {
                $this->isLogged = false;
                echo "Mauvais mot de passe ou login inconnu.";
            }
        }
        unset($username);
        unset($password);
        unset($user_password);
    }

    function create_account($username, $password, $password_confirm): void
    {
        $this->username = $username;
        $this->password = $password;
        $this->password_confirm = $password_confirm;

        $conn = new Connector();

        if ($password == $password_confirm) {
            $req = "INSERT INTO users VALUES (id, '$username', '$password')";
            $conn->mysqli->query($req, MYSQLI_USE_RESULT);

            header("Location: message/account_created.php");
        } else {
            echo "vos deux mots de passe ne sont pas identiques !";
        }
    }

    function create_project($project_name, $project_link, $project_desc, $project_date): void
    {
        $this->name = $project_name;
        $this->link = $project_link;
        $this->desc = $project_desc;
        $this->date = $project_date;

        $conn = new Connector();
        $req = "INSERT INTO projects (name, link, description, date) VALUES ('$project_name', '$project_link', '$project_desc', '$project_date')";

        $conn->mysqli->query($req, MYSQLI_USE_RESULT);

        header("Location: message/project_created.php");
    }

    function get_projects(): void
    {
        $conn = new Connector();
        $req = "SELECT * FROM projects";

        $result = $conn->mysqli->query($req, MYSQLI_USE_RESULT);

        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $link = $row['link'];
            $desc = $row['description'];
            $date = $row['date'];

            echo "\n       <div class='project-content'>\n";
            echo "            <a href='$link'>\n";
            echo "                <h2 class='title-project'>$name</h2>\n";
            echo "            </a>\n";
            echo "            <p class='desc-project'>$desc</p>\n";
            echo "            <span class='date-project'>$date</span>\n";
            echo "            <hr>";
            echo "\n        </div>";
        }
    }
}