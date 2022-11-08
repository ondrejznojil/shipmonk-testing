<?php declare(strict_types = 1);

namespace App\Model\Entity\Contract;

interface ResultItemInterface
{

    public function getId(): ?int;

    public function setId(?int $id): void;

    public function getResult(): ResultInterface;

    public function setResult(ResultInterface $result): void;

    public function getProductId(): int;

    public function setProductId(int $productId): void;

}
