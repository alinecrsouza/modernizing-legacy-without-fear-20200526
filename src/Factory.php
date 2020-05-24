<?php declare(strict_types=1);

final class Factory
{
    public function getDatabase(): Database
    {
        $configuration = $this->getConfiguration();

        return new Database(
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
}
