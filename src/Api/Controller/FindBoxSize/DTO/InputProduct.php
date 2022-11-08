<?php declare(strict_types = 1);

namespace App\Api\Controller\FindBoxSize\DTO;

class InputProduct
{

    public function __construct(
        private readonly int $id,
        private readonly float $width,
        private readonly float $height,
        private readonly float $depth,
        private readonly float $weight,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getDepth(): float
    {
        return $this->depth;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

}
