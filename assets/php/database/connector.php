<?php

/**
 * @property $link
 */
class Connector
{

    function isConnected()
    {
        $this->username = "root";
        $this->password = "root";
        $this->database = "data";
        $this->server = "localhost";
        $this->port = 3306;

        $this->link = mysqli_connect($this->server, $this->username, $this->password, $this->database, $this->port);

        if ($this->link) {
            return true;
        } else {
            die (mysqli_connect_error());
            return false;
        }
    }
}