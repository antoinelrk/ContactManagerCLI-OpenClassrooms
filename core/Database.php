<?php
class Database
{
    public ?PDO $connection = null;

    public function __construct($host, $database, $user, $password) {
        try
        {
            $this->connection = new \PDO(
                "mysql:host=$host;dbname=$database;charset=utf8",
                $user,
                $password,
                [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
            );
            echo "Database '$database' connected!\n";
        }
        catch (\Exception $e)
        {
            die('Error : ' . $e->getMessage());
        }
    }

    public function getConnection(): ?PDO
    {
        return $this->connection;
    }
}
