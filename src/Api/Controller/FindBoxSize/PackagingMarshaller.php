<?php declare(strict_types = 1);

namespace App\Api\Controller\FindBoxSize;

class PackagingMarshaller
{

    public function marshall(\App\Model\Entity\Contract\PackagingInterface $packaging): string
    {
        return \json_encode([
            'id' => $packaging->getId(),
            'width' => $packaging->getWidth(),
            'height' => $packaging->getHeight(),
            'length' => $packaging->getLength(),
            'maxWeight' => $packaging->getMaxWeight(),
        ]);
    }

}
