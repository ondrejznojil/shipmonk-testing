<?php declare(strict_types = 1);

namespace App\Packaging;

final class RandomPackagingSizeCalculator implements \App\Packaging\Contract\PackagingSizeCalculatorInterface
{

    public function calculate(
        \App\Api\Controller\FindBoxSize\DTO\Input $input
    ): \App\Model\Entity\Contract\PackagingInterface
    {
        return new \App\Model\Entity\Packaging(
          \rand(),\rand(),\rand(),\rand(),
        );
    }

}
