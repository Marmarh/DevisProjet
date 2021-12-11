<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DevisRepository::class)
 */
class Devis
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
    private $tarifMo;

    /**
     * @ORM\Column(type="float")
     */
    private $totalHt;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="devis" )
     */
    private $clients;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="devis")
     */
    private $vehicule;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="devis")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="devis")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=DevisOperation::class, mappedBy="devis")
     */
    private $devisOperations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->devisOperations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifMo(): ?float
    {
        return $this->tarifMo;
    }

    public function setTarifMo(float $tarifMo): self
    {
        $this->tarifMo = $tarifMo;

        return $this;
    }

    public function getTotalHt(): ?float
    {
        return $this->totalHt;
    }

    public function setTotalHt(float $totalHt): self
    {
        $this->totalHt = $totalHt;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->clients;
    }

    public function setClients(?Clients $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setDevis($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getDevis() === $this) {
                $image->setDevis(null);
            }
        }

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
            $devisOperation->setDevis($this);
        }

        return $this;
    }

    public function removeDevisOperation(DevisOperation $devisOperation): self
    {
        if ($this->devisOperations->removeElement($devisOperation)) {
            // set the owning side to null (unless already changed)
            if ($devisOperation->getDevis() === $this) {
                $devisOperation->setDevis(null);
            }
        }

        return $this;
    }


   
}
