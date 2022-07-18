<?php

/**
 * @property $username
 * @property $password
 * @property $password_confirm
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
        $req = "SELECT password FROM user_data WHERE username ='$username'";

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
            $req = "INSERT INTO user_data VALUES (id, '$username', '$password')";
            $conn->mysqli->query($req, MYSQLI_USE_RESULT);

            header("Location: message/account_created.php");
        } else {
            echo "vos deux mots de passe ne sont pas identiques !";
        }
    }

    function create_project(): void
    {

    }
}