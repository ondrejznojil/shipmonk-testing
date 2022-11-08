<?php declare(strict_types = 1);

namespace App\Packaging\Contract;

interface PackagingProviderInterface
{

    public function provide(
        \App\Api\Controller\FindBoxSize\DTO\Input $input,
    ): \App\Model\Entity\Contract\PackagingInterface;

}
