<?php declare(strict_types=1);

final class OrderMapper
{
    public function map(array $rows): array
    {
        $result = [];

        foreach ($rows as $row) {
            $result[] = [
                'Auftragsnummer' => $row['auftrag_id'],
                'Datum' => (new DateTimeImmutable($row['datum']))->format('d.m.Y'),
                'Auftraggeber' => $row['name'] . ', ' . $row['anschrift']
            ];
        }

        return $result;
    }
}
