<?php declare(strict_types = 1);

namespace App\Model\Entity\Contract;

interface ResultInterface
{

    public function getId(): ?int;

    public function setId(?int $id): void;

    public function getPackaging(): PackagingInterface;

    public function setPackaging(PackagingInterface $packaging): void;

}
