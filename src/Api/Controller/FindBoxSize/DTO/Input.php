<?php declare(strict_types = 1);

namespace App\Api\Controller\FindBoxSize\DTO;

class Input
{

    /**
     * @var InputProduct[]
     */
    private readonly array $products;

    public function __construct(
        InputProduct ...$products,
    ) {
        $this->products = $products;
    }

    /**
     * @return InputProduct[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function toArray(): array
    {
        return [
            'items' => [
                \array_map(
                    static fn (InputProduct $product) => [
                        'id' => $product->getId(),
                        'w' => $product->getWidth(),
                        'h' => $product->getHeight(),
                        'wg' => $product->getWeight(),
                        'd' => $product->getDepth(),
                    ],
                    $this->products,
                ),
            ],
        ];
    }

}
