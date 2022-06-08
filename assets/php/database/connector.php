<?php

class Connector
{
    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->username = "root";
        $this->password = "root";
        $this->database = "data";
        $this->server = "localhost";
        $this->port = 3306;

        $this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->database, $this->port);

        if ($this->mysqli->connect_error) {
            echo 'Errno: ' . $this->mysqli->connect_errno;
            echo '<br>';
            echo 'Error: ' . $this->mysqli->connect_error;
            exit();
        }

        //UNCOMMENT FOR TESTING
        /*
        echo 'Success: A proper connection to MySQL was made.';
        echo '<br>';
        echo 'Host information: ' . $this->mysqli->host_info;
        echo '<br>';
        echo 'Protocol version: ' . $this->mysqli->protocol_version;
        */
    }
}