<?php
require_once "secrets.php";

/**
 * @property string $password
 * @property string $username
 * @property string $database
 * @property string $server
 * @property int $port
 */
class Connector
{
    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->database = DBNAME;
        $this->server = HOST;
        $this->port = 3306;
    }

    private function db(): PDO
    {
        $dsn = "mysql:host=" . $this->server . ";port=" . $this->port . ";dbname=" . $this->database . ";charset=utf8";

        try {
            $db = new PDO($dsn, $this->username, $this->password);
        } catch (Exception $e) {
            echo "<div class='pop-up-message' id='pop-up-fail'>\n";
            echo "    <span>Database Error: Database Unreachable.</span>\n";
            echo "</div>\n";
        }

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $db;
    }

    function dbRun(string $sql, array $param): PDOStatement
    {
        $statement = $this->db()->prepare($sql);
        $statement->execute($param);
        return $statement;
    }
}