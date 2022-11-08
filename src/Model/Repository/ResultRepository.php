<?php declare(strict_types = 1);

namespace App\Model\Repository;

final class ResultRepository extends \Doctrine\ORM\EntityRepository
    implements \App\Model\Repository\Contract\ResultRepositoryInterface
{

    public function findByProductIds(int ...$ids): ?\App\Model\Entity\Contract\ResultInterface
    {
        if ( ! \count($ids)) {
            return NULL;
        }

        $query = $this->getEntityManager()->createQuery(
            'SELECT r FROM Result u JOIN ResultItem ri ON ri.result = r.id AND ri.productId IN (:ids)'
        );

        $query->setParameter('ids', $ids);

        return $query->getOneOrNullResult();
    }

    public function saveResult(
        \App\Model\Entity\Packaging $packaging,
        int ...$productIds,
    ): \App\Model\Entity\Contract\ResultInterface
    {
        $result = new \App\Model\Entity\Result($packaging);
        $this->getEntityManager()->persist($result);

        foreach ($productIds as $id) {
            $resultItem = new \App\Model\Entity\ResultItem($result, $id);

            $this->getEntityManager()->persist($resultItem);
        }

        $this->getEntityManager()->flush();

        return $result;
    }

}
