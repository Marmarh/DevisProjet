<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicesRepository::class)
 */
class Services
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
    private $serviceName;

    /**
     * @ORM\OneToMany(targetEntity=DevisOperation::class, mappedBy="services")
     */
    private $devisOperations;

    /**
     * @ORM\Column(type="float")
     */
    private $servicePrice;

    public function __construct()
    {
        $this->devisOperations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceName(): ?string
    {
        return $this->serviceName;
    }

    public function setServiceName(string $serviceName): self
    {
        $this->serviceName = $serviceName;

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
            $devisOperation->setServices($this);
        }

        return $this;
    }

    public function removeDevisOperation(DevisOperation $devisOperation): self
    {
        if ($this->devisOperations->removeElement($devisOperation)) {
            // set the owning side to null (unless already changed)
            if ($devisOperation->getServices() === $this) {
                $devisOperation->setServices(null);
            }
        }

        return $this;
    }

    public function getServicePrice(): ?float
    {
        return $this->servicePrice;
    }

    public function setServicePrice(float $servicePrice): self
    {
        $this->servicePrice = $servicePrice;

        return $this;
    }
}
