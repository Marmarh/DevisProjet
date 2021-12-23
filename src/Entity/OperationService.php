<?php

namespace App\Entity;

use App\Repository\OperationServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationServiceRepository::class)
 */
class OperationService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $tarif;

    /**
     * @ORM\Column(type="float")
     */
    private $rangeMin;

    /**
     * @ORM\Column(type="float")
     */
    private $rangeMax;

    /**
     * @ORM\ManyToOne(targetEntity=operation::class, inversedBy="operationServices")
     */
    private $operation;

    /**
     * @ORM\ManyToOne(targetEntity=services::class, inversedBy="operationServices")
     */
    private $services;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getRangeMin(): ?float
    {
        return $this->rangeMin;
    }

    public function setRangeMin(float $rangeMin): self
    {
        $this->rangeMin = $rangeMin;

        return $this;
    }

    public function getRangeMax(): ?float
    {
        return $this->rangeMax;
    }

    public function setRangeMax(float $rangeMax): self
    {
        $this->rangeMax = $rangeMax;

        return $this;
    }

    public function getOperation(): ?operation
    {
        return $this->operation;
    }

    public function setOperation(?operation $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getServices(): ?services
    {
        return $this->services;
    }

    public function setServices(?services $services): self
    {
        $this->services = $services;

        return $this;
    }
}
