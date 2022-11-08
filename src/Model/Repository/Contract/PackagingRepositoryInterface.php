<?php declare(strict_types = 1);

namespace App\Model\Repository\Contract;

interface PackagingRepositoryInterface
{

    public function find($id, $lockMode = null, $lockVersion = null): ?\App\Model\Entity\Contract\PackagingInterface;

}
