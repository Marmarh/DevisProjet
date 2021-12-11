<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreOperation;

    /**
     * @ORM\OneToMany(targetEntity=DevisOperation::class, mappedBy="operation")
     */
    private $devisOperations;

    public function __construct()
    {
        $this->devisOperations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreOperation(): ?string
    {
        return $this->titreOperation;
    }

    public function setTitreOperation(string $titreOperation): self
    {
        $this->titreOperation = $titreOperation;

        return $this;
    }

    /**
     * @return Collection|DevisOperation[]
     */
    public function getDevisOperations(): Collection
    {
        return $this->devisOperations;
    }

    public function addDevisOperation(DevisOperation $devisOperation): self
    {
        if (!$this->devisOperations->contains($devisOperation)) {
            $this->devisOperations[] = $devisOperation;
            $devisOperation->setOperation($this);
        }

        return $this;
    }

    public function removeDevisOperation(DevisOperation $devisOperation): self
    {
        if ($this->devisOperations->removeElement($devisOperation)) {
            // set the owning side to null (unless already changed)
            if ($devisOperation->getOperation() === $this) {
                $devisOperation->setOperation(null);
            }
        }

        return $this;
    }
}
