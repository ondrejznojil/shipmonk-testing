<?php declare(strict_types = 1);

namespace App;

final class Application
{

    public function __construct(
        private readonly Api\Controller\FindBoxSize\FindBoxSizeController $findBoxSizeController,
    ) {}

    public function run(\Psr\Http\Message\RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->findBoxSizeController->handle($request);
        } catch (\Exception) {
            return new \GuzzleHttp\Psr7\Response(500, [], 'Unexpected error has occurred.');
        }
    }

}
