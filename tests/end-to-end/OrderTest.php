<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @large
 * @group end-to-end
 * @group characterization
 */
final class OrderTest extends TestCase
{
    public function test_can_be_retrieved_as_JSON_document_by_HTTP_request(): void
    {
        $response = $this->request(
            'http://localhost:8080/auftraege_als_json.php?jahr=2020'
        );

        $this->assertSame(
            [
                [
                    'Auftragsnummer' => '1',
                    'Datum' => '26.05.2020',
                    'Auftraggeber' => 'ACME GmbH, Foostrasse 123, 12345 Barhausen',
                ],
            ],
            json_decode($response['body'], true)
        );

        $this->assertContains(
            'Content-Type: application/json; charset=utf-8',
            $response['headers']
        );
    }

    private function request(string $url): array
    {
        return [
            'body' => file_get_contents($url),
            'headers' => $http_response_header
        ];
    }
}
