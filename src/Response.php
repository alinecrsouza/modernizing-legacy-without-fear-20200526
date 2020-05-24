<?php declare(strict_types=1);

final class Response
{
    /**
     * @var string[]
     */
    private $headers = [];

    /**
     * @var string
     */
    private $body;

    public function addHeader(string $header): void
    {
        $this->headers[] = $header;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function send(): void
    {
        foreach ($this->headers as $header) {
            header($header);
        }

        print $this->body;
    }

    public function body(): string
    {
        return $this->body;
    }

    /**
     * @return string[]
     */
    public function headers(): array
    {
        return $this->headers;
    }
}
