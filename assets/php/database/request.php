<?php

/**
 * @property $user_password
 */
class Request
{
    function __construct($username, $password)
    {
        require_once "connector.php";
        $conn = new Connector();

        $this->username = $username;
        $this->password = $password;

        $this->user_password = mysqli_query($conn->link, "SELECT password FROM user_data WHERE username ='$this->username'");
    }
}