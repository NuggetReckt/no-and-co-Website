<?php

/**
 * @property string $username
 * @property string $password
 * @property string $password_confirm
 * @property string $name
 * @property string $link
 * @property string $desc
 * @property string $date
 * @property string $actu_name
 * @property string $actu_desc
 * @property string $actu_date
 */

class PanelRequest
{
    function __construct()
    {
        require_once "../assets/php/database/connector.php";
    }

    function login($username, $password): void
    {
        session_unset();

        $this->username = $username;
        $this->password = $password;

        $req = "SELECT password FROM admins WHERE username ='$username';";
        $req2 = "SELECT username FROM admins;";

        $conn = new Connector();

        if ($username != null && $password != null) {
            $result = $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);
            $result2 = $conn->dbRun($req2, [])->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $i => $value) {
                $user_password = $value['password'];

                if ($password == $user_password) {
                    $_SESSION['admin'] = $username;

                    //echo "Mot de passe correct.";
                    sleep(1);

                    header("Location: index.php?logged");
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

    function create_account($username, $password, $password_confirm): void
    {
        $this->username = $username;
        $this->password = $password;
        $this->password_confirm = $password_confirm;

        $conn = new Connector();

        if ($username != null && $password != null) {
            if ($password == $password_confirm) {
                $req = "INSERT INTO users VALUES (id, '$username', '$password');";
                $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);

                header("Location: add_account.php?account_created");
            } else {
                //Les deux mdp ne peuvent pas être identiques
                header("Location: add_account.php?error=4");
            }
        } else {
            //Les champs ne peuvent pas être vides
            header("Location: add_account.php?error=2");
        }
    }

    function create_project($project_name, $project_link, $project_desc, $project_date): void
    {
        $this->name = $project_name;
        $this->link = $project_link;
        $this->desc = $project_desc;
        $this->date = $project_date;

        $conn = new Connector();
        $req = "INSERT INTO projects (name, link, description, date) VALUES ('$project_name', '$project_link', '$project_desc', '$project_date');";

        $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);

        header("Location: add_project.php?project_created");
    }

    function create_actu($actu_name, $actu_desc, $actu_date): void
    {
        $this->actu_name = $actu_name;
        $this->actu_desc = $actu_desc;
        $this->actu_date = $actu_date;

        $conn = new Connector();
        $req = "INSERT INTO actus (name, description, date) VALUES ('$actu_name', '$actu_desc', '$actu_date');";

        $conn->dbRun($req, [])->fetchAll(PDO::FETCH_ASSOC);

        header("Location: add_actu.php?actu_created");
    }
}