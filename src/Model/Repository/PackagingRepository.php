<?php declare(strict_types = 1);

namespace App\Model\Repository;

final class PackagingRepository extends \Doctrine\ORM\EntityRepository
    implements \App\Model\Repository\Contract\PackagingRepositoryInterface
{

    public function find($id, $lockMode = null, $lockVersion = null): ?\App\Model\Entity\Contract\PackagingInterface
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

}
