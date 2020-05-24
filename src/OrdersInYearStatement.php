<?php declare(strict_types=1);

final class OrdersInYearStatement
{
    /**
     * @var Database
     */
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function execute(int $year): array
    {
        return $this->database->query(
            'SELECT *
               FROM auftrag, kunde
              WHERE auftrag.kunden_id = kunde.kunden_id
                AND auftrag.datum BETWEEN "' . $year . '-01-01" AND "' . $year . '-12-31";'
        );
    }
}
