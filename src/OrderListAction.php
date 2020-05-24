<?php declare(strict_types=1);

final class OrderListAction
{
    /**
     * @var OrdersInYearStatement
     */
    private $statement;

    /**
     * @var OrderMapper
     */
    private $mapper;

    public function __construct(OrdersInYearStatement $statement, OrderMapper $mapper)
    {
        $this->statement = $statement;
        $this->mapper    = $mapper;
    }

    public function execute(): Response
    {
        $rows = $this->statement->execute((int) $_GET['jahr']);

        $data = $this->mapper->map($rows);

        $response = new Response;

        $response->addHeader('Content-Type: application/json; charset=utf-8');

        $response->setBody(json_encode($data) . PHP_EOL);

        return $response;
    }
}
