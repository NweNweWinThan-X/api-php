<?php
class Database
{
    // DB params
    private $host = "localhost";
    private $dbname = "api_php";
    private $username = "root";
    private $password = "root";
    private $connection;

    // DB connection
    public function connect()
    {
        $this->connection = null;
        try {
            $this->connection = new PDO(
                "mysql:host=". $this->host .
                ";dbname=" . $this->dbname,
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->connection;
    }
}
