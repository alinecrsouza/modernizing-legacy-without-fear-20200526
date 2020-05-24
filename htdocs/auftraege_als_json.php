<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/db.php';

$result = $DB->query(
    'SELECT *
       FROM auftrag, kunde
      WHERE auftrag.kunden_id = kunde.kunden_id
        AND auftrag.datum BETWEEN "' . $_GET['jahr'] . '-01-01" AND "' . $_GET['jahr'] . '-12-31";'
);

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

