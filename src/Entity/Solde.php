<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SoldeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SoldeRepository::class)
 */
class Solde
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $data1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $data2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $data3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData1(): ?int
    {
        return $this->data1;
    }

    public function setData1(?int $data1): self
    {
        $this->data1 = $data1;

        return $this;
    }

    public function getData2(): ?int
    {
        return $this->data2;
    }

    public function setData2(?int $data2): self
    {
        $this->data2 = $data2;

        return $this;
    }

    public function getData3(): ?int
    {
        return $this->data3;
    }

    public function setData3(?int $data3): self
    {
        $this->data3 = $data3;

        return $this;
    }
}
