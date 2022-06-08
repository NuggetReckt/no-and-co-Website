<?php

/**
 * @property $username
 * @property $password
 */
class Request
{

    public bool $isLogged = False;

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
                header("Location: https://no-an-co.com/panel.php");
                $this->isLogged = True;
                echo "Mot de passe correct.";
            } else {
                $this->isLogged = False;
                header("location: https://no-an-co.com/login.php");
                echo "Mauvais mot de passe ou login inconnu.";
            }
        }

        unset($password);
        unset($username);
        unset($user_password);
    }
}