<?php declare(strict_types=1);

final class Factory
{
    public function getDatabase(): MysqlDatabase
    {
        $configuration = $this->getConfiguration();

        return new MysqlDatabase(
            $configuration->databaseHostname(),
            $configuration->databaseUsername(),
            $configuration->databasePassword(),
            $configuration->databaseName()
        );
    }

    public function getConfiguration(): Configuration
    {
        return new Configuration;
    }

    public function getOrderListAction(): OrderListAction
    {
        return new OrderListAction(
            new OrdersInYearStatement($this->getDatabase()),
            new OrderMapper
        );
    }
}
