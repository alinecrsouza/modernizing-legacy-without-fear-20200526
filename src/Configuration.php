<?php declare(strict_types=1);

/**
 * @todo Read configuration from some source
 */
final class Configuration
{
    public function databaseHostname(): string
    {
        return 'localhost';
    }

    public function databaseUsername(): string
    {
        return 'test';
    }

    public function databasePassword(): string
    {
        return 'password';
    }

    public function databaseName(): string
    {
        return 'test';
    }
}
