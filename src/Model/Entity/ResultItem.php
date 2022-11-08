<?php declare(strict_types = 1);

namespace App\Model\Entity;

#[\Doctrine\ORM\Mapping\Entity]
class ResultItem implements \App\Model\Entity\Contract\ResultItemInterface
{

    #[\Doctrine\ORM\Mapping\Id]
    #[\Doctrine\ORM\Mapping\GeneratedValue]
    #[\Doctrine\ORM\Mapping\Column(type: 'integer')]
    private ?int $id = null;

    #[\Doctrine\ORM\Mapping\Column(type: 'int')]
    private int $productId;

    #[\Doctrine\ORM\Mapping\ManyToOne(Result::class)]
    private Result $result;

    public function __construct(Result $result, int $productId)
    {
        $this->result = $result;
        $this->productId = $productId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getResult(): Result
    {
        return $this->result;
    }

    public function setResult(\App\Model\Entity\Contract\ResultInterface $result): void
    {
        $this->result = $result;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

}
