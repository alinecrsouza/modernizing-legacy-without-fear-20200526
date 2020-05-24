<?php declare(strict_types=1);

final class OrderMapper
{
    public function map(array $rows): array
    {
        $result = [];

        foreach ($rows as $row) {
            $this->ensureRowIsValid($row);

            $result[] = [
                'Auftragsnummer' => $row['auftrag_id'],
                'Datum' => (new DateTimeImmutable($row['datum']))->format('d.m.Y'),
                'Auftraggeber' => $row['name'] . ', ' . $row['anschrift']
            ];
        }

        return $result;
    }

    private function ensureRowIsValid(array $row): void
    {
        if (!isset($row['auftrag_id'], $row['datum'], $row['name'], $row['anschrift'])) {
            throw new RuntimeException;
        }
    }
}
