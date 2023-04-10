<?php

namespace App\Entity;

use App\Repository\ActorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActorsRepository::class)]
class Actors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: movies::class, inversedBy: 'actors')]
    private Collection $movies_actors;

    public function __construct()
    {
        $this->movies_actors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, movies>
     */
    public function getMoviesActors(): Collection
    {
        return $this->movies_actors;
    }

    public function addMoviesActor(movies $moviesActor): self
    {
        if (!$this->movies_actors->contains($moviesActor)) {
            $this->movies_actors->add($moviesActor);
        }

        return $this;
    }

    public function removeMoviesActor(movies $moviesActor): self
    {
        $this->movies_actors->removeElement($moviesActor);

        return $this;
    }
}
