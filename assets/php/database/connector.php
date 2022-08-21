<?php
/**
 * @property string $password
 * @property string $username
 * @property string $database
 * @property string $server
 * @property int $port
 */
class Connector
{
    public mysqli $mysqli;

    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->username = "root";
        $this->password = "root";
        $this->database = "data";
        $this->server = "localhost";
        $this->port = 3306;

        try {
            $this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->database, $this->port);
        } catch (mysqli_sql_exception) {
            echo "<div class='pop-up-message' id='pop-up-fail'>";
            echo "    <span>Database Error: Database Offline.</span>\n";
            echo "</div>";
        }


        //UNCOMMENT FOR TESTING
        /*
        if ($this->mysqli->connect_error) {
            echo 'Errno: ' . $this->mysqli->connect_errno;
            echo '<br>';
            echo 'Error: ' . $this->mysqli->connect_error;
            exit();
        }
        echo 'Success: A proper connection to MySQL was made.';
        echo '<br>';
        echo 'Host information: ' . $this->mysqli->host_info;
        echo '<br>';
        echo 'Protocol version: ' . $this->mysqli->protocol_version;
        */
    }
}