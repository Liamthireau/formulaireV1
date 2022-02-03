<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgentsRepository::class)]
class Agents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\Column(type: 'text')]
    private $email;

    #[ORM\Column(type: 'text')]
    private $telephone;

    #[ORM\ManyToMany(targetEntity: Collectivites::class, mappedBy: 'relation')]
    private $collectivites;

    #[ORM\ManyToMany(targetEntity: Extranets::class, mappedBy: 'relations')]
    private $extranets;

    public function __construct()
    {
        $this->collectivites = new ArrayCollection();
        $this->extranets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|Collectivites[]
     */
    public function getCollectivites(): Collection
    {
        return $this->collectivites;
    }

    public function addCollectivite(Collectivites $collectivite): self
    {
        if (!$this->collectivites->contains($collectivite)) {
            $this->collectivites[] = $collectivite;
            $collectivite->addRelation($this);
        }

        return $this;
    }

    public function removeCollectivite(Collectivites $collectivite): self
    {
        if ($this->collectivites->removeElement($collectivite)) {
            $collectivite->removeRelation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Extranets[]
     */
    public function getExtranets(): Collection
    {
        return $this->extranets;
    }

    public function addExtranet(Extranets $extranet): self
    {
        if (!$this->extranets->contains($extranet)) {
            $this->extranets[] = $extranet;
            $extranet->addRelation($this);
        }

        return $this;
    }

    public function removeExtranet(Extranets $extranet): self
    {
        if ($this->extranets->removeElement($extranet)) {
            $extranet->removeRelation($this);
        }

        return $this;
    }
}
