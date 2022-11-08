<?php declare(strict_types = 1);

namespace App\Api\Controller\FindBoxSize;

class FindBoxSizeController
{

    public function __construct(
        private readonly InputMarshaller $inputMarshaller,
        private readonly \App\Packaging\Contract\PackagingProviderInterface $packagingProvider,
        private readonly PackagingMarshaller $packagingMarshaller,
    ) {}

    public function handle(\Psr\Http\Message\RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        try {
            $input = $this->inputMarshaller->marshall($request->getBody()->getContents());

            $packaging = $this->packagingProvider->provide($input);

            return new \GuzzleHttp\Psr7\Response(200, [], $this->packagingMarshaller->marshall($packaging));
        } catch (\Nette\Schema\ValidationException|\GuzzleHttp\Exception\ClientException $e) {
            return new \GuzzleHttp\Psr7\Response(400, [], $e->getMessage());
        }
    }

}
