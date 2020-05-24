<?php declare(strict_types=1);

final class MysqlDatabase implements Database
{
    /**
     * @var mysqli
     */
    private $mysqli;

    public function __construct(string $hostname, string $username, string $password, string $database)
    {
        $this->mysqli = new mysqli($hostname, $username, $password, $database);
    }

    public function query(string $query): array
    {
        return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}
