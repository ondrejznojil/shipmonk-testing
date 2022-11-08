<?php declare(strict_types = 1);

namespace App\Packaging;

final class PackagingProvider implements \App\Packaging\Contract\PackagingProviderInterface
{

    public function __construct(
        private readonly \App\Model\Repository\Contract\ResultRepositoryInterface $resultRepository,
        private readonly \App\BinPackaging\Endpoint\FindBoxSize\FindBoxSizeId $findBoxSizeEndpoint,
        private readonly \App\Model\Repository\Contract\PackagingRepositoryInterface $packagingRepository,
        private readonly \App\Packaging\Contract\PackagingSizeCalculatorInterface $packagingSizeCalculator,
    ) {}

    public function provide(
        \App\Api\Controller\FindBoxSize\DTO\Input $input,
    ): \App\Model\Entity\Contract\PackagingInterface
    {
        $package = $this->findCachedResult($input);

        if ($package) {
            return $package->getPackaging();
        }

        try {
            $packageId = $this->findBoxSizeEndpoint->find($input);
            $package = $this->packagingRepository->find($packageId);

            if ($package) {
                $this->resultRepository->saveResult($package, ...$this->extractIds($input));

                return $package;
            }

            return $this->getFallbackResult($input);
        } catch (\GuzzleHttp\Exception\ServerException) {
            return $this->getFallbackResult($input);
        }
    }

    private function getFallbackResult(
        \App\Api\Controller\FindBoxSize\DTO\Input $input,
    ): \App\Model\Entity\Contract\PackagingInterface
    {
        return $this->packagingSizeCalculator->calculate($input);
    }

    private function findCachedResult(
        \App\Api\Controller\FindBoxSize\DTO\Input $input,
    ): ?\App\Model\Entity\Contract\ResultInterface
    {
        return $this->resultRepository->findByProductIds(...$this->extractIds($input));
    }

    private function extractIds(\App\Api\Controller\FindBoxSize\DTO\Input $input): array
    {
        $ids = [];
        foreach ($input->getProducts() as $product) {
            $ids[] = $product->getId();
        }

        return $ids;
    }

}
