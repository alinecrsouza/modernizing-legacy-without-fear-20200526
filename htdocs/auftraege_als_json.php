<?php
require __DIR__ . '/../src/autoload.php';

$factory = new Factory;
$db = $factory->getDatabase();

$statement = new OrdersInYearStatement($db);
$result    = $statement->execute((int) $_GET['jahr']);
$auftraege = [];

foreach ($result as $row) {
    $auftraege[] = [
        'Auftragsnummer' => $row['auftrag_id'],
        'Datum' => (new DateTimeImmutable($row['datum']))->format('d.m.Y'),
        'Auftraggeber' => $row['name'] . ', ' . $row['anschrift']
    ];
}

header('Content-Type: application/json; charset=utf-8');
print json_encode($auftraege) . PHP_EOL;
