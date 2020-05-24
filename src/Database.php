<?php declare(strict_types=1);

final class Database
{
    /**
     * @var mysqli
     */
    private $mysqli;

    public function __construct(string $hostname, string $username, string $password, string $database)
    {
        $this->mysqli = new mysqli($hostname, $username, $password, $database);
    }

    public function query(string $query): mysqli_result
    {
        return $this->mysqli->query($query);
    }
}
