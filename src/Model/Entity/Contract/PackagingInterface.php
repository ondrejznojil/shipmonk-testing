<?php declare(strict_types = 1);

namespace App\Model\Entity\Contract;

interface PackagingInterface
{

    public function getId(): ?int;

    public function setId(?int $id): void;

    public function getWidth(): float;

    public function setWidth(float $width): void;

    public function getHeight(): float;

    public function setHeight(float $height): void;

    public function getLength(): float;

    public function setLength(float $length): void;

    public function getMaxWeight(): float;

    public function setMaxWeight(float $maxWeight): void;

}
