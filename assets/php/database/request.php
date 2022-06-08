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

        $user_password = $conn->mysqli->query($req, MYSQLI_USE_RESULT);

        if ($user_password == $password) {
            //header("Location: app.php");
            $this->isLogged = True;
            echo "Mot de passe correct.";
        }
        else if ($user_password =! $password) {
            //header("location: login.php");
            $this->isLogged = False;
            echo "Mauvais mot de passe.";
        }
        else {
            echo "Une erreur inconnue est survenue.";
        }
        unset($password);
        unset($username);
        unset($user_password);
    }
}