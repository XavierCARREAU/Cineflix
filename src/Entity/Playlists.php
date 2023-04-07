<?php

namespace App\Entity;

use App\Repository\PlaylistsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistsRepository::class)]
class Playlists
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $public = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Movies::class, inversedBy: 'playlists')]
    private Collection $Playlists_Movies;

    #[ORM\ManyToOne(inversedBy: 'playlists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $created_by = null;

    #[ORM\ManyToMany(targetEntity: Users::class, inversedBy: 'subscribed_playlists')]
    private Collection $whitelist;

    public function __construct()
    {
        $this->Playlists_Movies = new ArrayCollection();
        $this->whitelist = new ArrayCollection();
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

    public function isPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

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

    /**
     * @return Collection<int, Movies>
     */
    public function getPlaylistsMovies(): Collection
    {
        return $this->Playlists_Movies;
    }

    public function addPlaylistsMovie(Movies $playlistsMovie): self
    {
        if (!$this->Playlists_Movies->contains($playlistsMovie)) {
            $this->Playlists_Movies->add($playlistsMovie);
        }

        return $this;
    }

    public function removePlaylistsMovie(Movies $playlistsMovie): self
    {
        $this->Playlists_Movies->removeElement($playlistsMovie);

        return $this;
    }

    public function getCreatedBy(): ?Users
    {
        return $this->created_by;
    }

    public function setCreatedBy(?Users $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getWhitelist(): Collection
    {
        return $this->whitelist;
    }

    public function addWhitelist(Users $whitelist): self
    {
        if (!$this->whitelist->contains($whitelist)) {
            $this->whitelist->add($whitelist);
        }

        return $this;
    }

    public function removeWhitelist(Users $whitelist): self
    {
        $this->whitelist->removeElement($whitelist);

        return $this;
    }
}
