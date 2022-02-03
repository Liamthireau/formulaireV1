<?php

namespace App\Entity;

use App\Repository\ExtranetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtranetsRepository::class)]
class Extranets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\ManyToMany(targetEntity: Agents::class, inversedBy: 'extranets')]
    private $relations;

    public function __construct()
    {
        $this->relations = new ArrayCollection();
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

    /**
     * @return Collection|Agents[]
     */
    public function getRelations(): Collection
    {
        return $this->relations;
    }

    public function addRelation(Agents $relation): self
    {
        if (!$this->relations->contains($relation)) {
            $this->relations[] = $relation;
        }

        return $this;
    }

    public function removeRelation(Agents $relation): self
    {
        $this->relations->removeElement($relation);

        return $this;
    }
}
