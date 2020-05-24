<?php declare(strict_types=1);

interface Database
{
    public function query(string $query): array;
}
