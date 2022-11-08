<?php declare(strict_types=1);

namespace App\BinPackaging;

final class Configuration
{

    public function __construct(
        private readonly string $username,
        private readonly string $apiKey,
        private readonly string $host,
    ) {}

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getHost(): string
    {
        return $this->host;
    }

}
