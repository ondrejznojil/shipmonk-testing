<?php declare(strict_types = 1);

namespace App\Model\Entity;

#[\Doctrine\ORM\Mapping\Entity(repositoryClass: \App\Model\Repository\ResultRepository::class)]
class Result implements \App\Model\Entity\Contract\ResultInterface
{

    #[\Doctrine\ORM\Mapping\Id]
    #[\Doctrine\ORM\Mapping\GeneratedValue]
    #[\Doctrine\ORM\Mapping\Column(type: 'integer')]
    private ?int $id = null;

    #[\Doctrine\ORM\Mapping\ManyToOne(Packaging::class)]
    private Packaging $packaging;

    public function __construct(Packaging $packaging)
    {
        $this->packaging = $packaging;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPackaging(): Packaging
    {
        return $this->packaging;
    }

    public function setPackaging(\App\Model\Entity\Contract\PackagingInterface $packaging): void
    {
        $this->packaging = $packaging;
    }

}
