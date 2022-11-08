<?php declare(strict_types = 1);

namespace App\Model\Repository\Contract;

interface ResultRepositoryInterface
{

    public function findByProductIds(int ...$ids): ?\App\Model\Entity\Contract\ResultInterface;

    public function saveResult(
        \App\Model\Entity\Packaging $packaging,
        int ...$productIds,
    ): \App\Model\Entity\Contract\ResultInterface;

}
