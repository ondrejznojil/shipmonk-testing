<?php declare(strict_types = 1);

namespace App\Api\Controller\FindBoxSize;

class InputMarshaller
{

    public function __construct(
        private readonly InputValidator $inputValidator,
    ) {}

    public function marshall(string $data): \App\Api\Controller\FindBoxSize\DTO\Input
    {
        $data = \json_decode($data, TRUE);

        if ( ! $data) {
            throw new \Nette\Schema\ValidationException('Corrupted JSON data.');
        }

        $this->inputValidator->validate($data);

        $products = \array_map($this->marshallProduct(...), $data['items']);

        return new \App\Api\Controller\FindBoxSize\DTO\Input(...$products);
    }

    public function marshallProduct(array $data): \App\Api\Controller\FindBoxSize\DTO\InputProduct
    {
        return new \App\Api\Controller\FindBoxSize\DTO\InputProduct(
            $data['id'],
            $data['width'],
            $data['height'],
            $data['weight'],
            $data['depth'],
        );
    }

}
