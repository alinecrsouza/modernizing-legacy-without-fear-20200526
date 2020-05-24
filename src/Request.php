<?php declare(strict_types=1);

final class Request
{
    /**
     * @var string[]
     */
    private $get = [];

    public static function fromSuperglobals(): self
    {
        return new self($_GET);
    }

    public static function fromParameters(array $get): self
    {
        return new self($get);
    }

    private function __construct(array $get)
    {
        $this->get = $get;
    }

    public function get(string $parameter): string
    {
        return $this->get[$parameter];
    }
}
