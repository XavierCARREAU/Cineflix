<?php

namespace App\Entity;

use App\Repository\MoviesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoviesRepository::class)]
class Movies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $poster = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $release_date = null;

    #[ORM\Column(length: 255)]
    private ?string $director = null;

    #[ORM\Column(length: 255)]
    private ?string $productor = null;

    #[ORM\ManyToMany(targetEntity: Playlists::class, mappedBy: 'Playlists_Movies')]
    private Collection $playlists;

    #[ORM\ManyToMany(targetEntity: Actors::class, mappedBy: 'movies_actors')]
    private Collection $actors;

    #[ORM\ManyToMany(targetEntity: Categories::class, mappedBy: 'Movies_Categories')]
    private Collection $categories;

    public function __construct()
    {
        $this->playlists = new ArrayCollection();
        $this->actors = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(\DateTimeInterface $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getProductor(): ?string
    {
        return $this->productor;
    }

    public function setProductor(string $productor): self
    {
        $this->productor = $productor;

        return $this;
    }

    /**
     * @return Collection<int, Playlists>
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylist(Playlists $playlist): self
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists->add($playlist);
            $playlist->addPlaylistsMovie($this);
        }

        return $this;
    }

    public function removePlaylist(Playlists $playlist): self
    {
        if ($this->playlists->removeElement($playlist)) {
            $playlist->removePlaylistsMovie($this);
        }

        return $this;
    }

    public function addActor(Actors $actor): self
    {
        if (!$this->actors->contains($actor)) {
            $this->actors->add($actor);
            $actor->addMoviesActor($this);
        }

        return $this;
    }

    public function removeActor(Actors $actor): self
    {
        if ($this->actors->removeElement($actor)) {
            $actor->removeMoviesActor($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addMoviesCategory($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeMoviesCategory($this);
        }

        return $this;
    }

}
