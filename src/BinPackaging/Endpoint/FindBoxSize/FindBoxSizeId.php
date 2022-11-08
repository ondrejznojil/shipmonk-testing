<?php declare(strict_types = 1);

namespace App\BinPackaging\Endpoint\FindBoxSize;

class FindBoxSizeId
{

    private const ENDPOINT_URI = 'packer/findBinSize';

    public function __construct(
        private readonly \App\BinPackaging\ClientProvider $clientProvider,
        private readonly \App\BinPackaging\Configuration $configuration,
    ) {}

    public function find(
        \App\Api\Controller\FindBoxSize\DTO\Input $input,
    ): ?int
    {
        $client = $this->clientProvider->provide();

        $data = [
            \GuzzleHttp\RequestOptions::JSON => [
                'username' => $this->configuration->getUsername(),
                'api_key' => $this->configuration->getApiKey(),
                ...$input->toArray(),
            ],
        ];

        $response = $client->post(self::ENDPOINT_URI, $data);
        $binId = $response['bins']['id'] ?? NULL;

        return $binId ? (int) $binId : NULL;
    }

}
