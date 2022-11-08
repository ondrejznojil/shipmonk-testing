<?php declare(strict_types = 1);

namespace App\BinPackaging;

class ClientProvider
{

    private ?\GuzzleHttp\Client $client = NULL;

    public function __construct(
        private readonly Configuration $configuration,
    ) {}

    public function provide(): \GuzzleHttp\Client
    {
        if ($this->client === NULL) {
            $this->client = new \GuzzleHttp\Client([
                'base_uri' => $this->configuration->getHost(),
            ]);

            $this->setupLogger();
        }

        return $this->client;
    }

    private function setupLogger(): void
    {
        $logger = new \Monolog\Logger('bin-packaging-api');
        $logger->pushHandler(new \Monolog\Handler\RotatingFileHandler('./log.txt'));

        $messageFormat = 'REQUEST: urldecode(req_body)';
        $guzzleLogger = \GuzzleHttp\Middleware::log($logger, new \GuzzleHttp\MessageFormatter($messageFormat));

        $handlerStack = \GuzzleHttp\HandlerStack::create();
        $handlerStack->push($guzzleLogger);
    }

}
