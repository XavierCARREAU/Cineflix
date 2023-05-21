<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Un compte utilisant cette adresse e-mail existe déjà.')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 100)]
    private ?string $username = null;

    #[ORM\Column(length: 255 , options:['default'=>'public\upload\images\profil\default.png'])]
    private ?string $profil_pic = null;
    
    #[ORM\Column(type: 'datetime_immutable', options:['default'=>'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToMany(targetEntity: Movies::class)]
    private Collection $Users_movies;

    #[ORM\OneToMany(mappedBy: 'created_by', targetEntity: Playlists::class, orphanRemoval: true)]
    private Collection $playlists;

    #[ORM\ManyToMany(targetEntity: Playlists::class, mappedBy: 'whitelist')]
    private Collection $subscribed_playlists;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    public function __construct()
    {
        $this->Users_movies = new ArrayCollection();
        $this->playlists = new ArrayCollection();
        $this->subscribed_playlists = new ArrayCollection();
        $this->profil_pic = "public\images\profil\default.png";
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getProfilPic(): ?string
    {
        return $this->profil_pic;
    }

    public function setProfilPic(string $profil_pic): self
    {
        $this->profil_pic = $profil_pic;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection<int, Movies>
     */
    public function getUsersMovies(): Collection
    {
        return $this->Users_movies;
    }

    public function addUsersMovie(Movies $usersMovie): self
    {
        if (!$this->Users_movies->contains($usersMovie)) {
            $this->Users_movies->add($usersMovie);
        }

        return $this;
    }

    public function removeUsersMovie(Movies $usersMovie): self
    {
        $this->Users_movies->removeElement($usersMovie);

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
            $playlist->setCreatedBy($this);
        }

        return $this;
    }

    public function removePlaylist(Playlists $playlist): self
    {
        if ($this->playlists->removeElement($playlist)) {
            // set the owning side to null (unless already changed)
            if ($playlist->getCreatedBy() === $this) {
                $playlist->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Playlists>
     */
    public function getSubscribedPlaylists(): Collection
    {
        return $this->subscribed_playlists;
    }

    public function addSubscribedPlaylist(Playlists $subscribedPlaylist): self
    {
        if (!$this->subscribed_playlists->contains($subscribedPlaylist)) {
            $this->subscribed_playlists->add($subscribedPlaylist);
            $subscribedPlaylist->addWhitelist($this);
        }

        return $this;
    }

    public function removeSubscribedPlaylist(Playlists $subscribedPlaylist): self
    {
        if ($this->subscribed_playlists->removeElement($subscribedPlaylist)) {
            $subscribedPlaylist->removeWhitelist($this);
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function __toString()
    {
        return $this->username;
    }
}
