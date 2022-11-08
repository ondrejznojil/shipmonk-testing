<?php declare(strict_types = 1);

namespace App\Model\Entity;

#[\Doctrine\ORM\Mapping\Entity]
class Packaging implements \App\Model\Entity\Contract\PackagingInterface
{

    #[\Doctrine\ORM\Mapping\Id]
    #[\Doctrine\ORM\Mapping\GeneratedValue]
    #[\Doctrine\ORM\Mapping\Column(type: 'integer')]
    private ?int $id = null;

    #[\Doctrine\ORM\Mapping\Column(type: 'float')]
    private float $width;

    #[\Doctrine\ORM\Mapping\Column(type: 'float')]
    private float $height;

    #[\Doctrine\ORM\Mapping\Column(type: 'float')]
    private float $length;

    #[\Doctrine\ORM\Mapping\Column(type: 'float')]
    private float $maxWeight;

    public function __construct(float $width, float $height, float $length, float $maxWeight)
    {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->maxWeight = $maxWeight;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function setLength(float $length): void
    {
        $this->length = $length;
    }

    public function getMaxWeight(): float
    {
        return $this->maxWeight;
    }

    public function setMaxWeight(float $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }

}
