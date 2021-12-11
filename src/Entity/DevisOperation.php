<?php

namespace App\Entity;

use App\Repository\DevisOperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DevisOperationRepository::class)
 */
class DevisOperation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Devis::class, inversedBy="devisOperations" ,cascade={"persist"})
     */
    private $devis;

    /**
     * @ORM\ManyToOne(targetEntity=Services::class, inversedBy="devisOperations" ,cascade={"persist"})
     */
    private $services;

    /**
     * @ORM\ManyToOne(targetEntity=Operation::class, inversedBy="devisOperations" ,cascade={"persist"})
     */
    private $operation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDevis(): ?Devis
    {
        return $this->devis;
    }

    public function setDevis(?Devis $devis): self
    {
        $this->devis = $devis;

        return $this;
    }

    public function getServices(): ?Services
    {
        return $this->services;
    }

    public function setServices(?Services $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    public function setOperation(?Operation $operation): self
    {
        $this->operation = $operation;

        return $this;
    }
}
