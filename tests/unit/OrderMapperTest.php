<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers OrderMapper
 */
final class OrderMapperTest extends TestCase
{
    public function testMapsQueryResult(): void
    {
        $mapper = new OrderMapper;

        $this->assertSame(
            [
                [
                    'Auftragsnummer' => '1',
                    'Datum' => '13.09.2019',
                    'Auftraggeber' => 'ACME GmbH, Foostrasse 123, 12345 Barhausen',
                ],
            ],
            $mapper->map(
                [
                    [
                        'auftrag_id' => '1',
                        'kunden_id' => '1',
                        'datum' => '2019-09-13',
                        'name' => 'ACME GmbH',
                        'anschrift' => 'Foostrasse 123, 12345 Barhausen',

                    ]
                ]
            )
        );
    }
}
