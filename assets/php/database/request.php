<?php

/**
 * @property $username
 * @property $password
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
}