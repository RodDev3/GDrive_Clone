<?php

namespace App\Entity;

use App\Repository\SpaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpaceRepository::class)]
class Space
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?user $user = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $admin = null;

    #[ORM\ManyToMany(targetEntity: user::class)]
    private Collection $space_user;

    #[ORM\OneToMany(mappedBy: 'space', targetEntity: File::class, orphanRemoval: true)]
    private Collection $files;

    public function __construct()
    {
        $this->space_user = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAdmin(): ?user
    {
        return $this->admin;
    }

    public function setAdmin(user $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getSpaceUser(): Collection
    {
        return $this->space_user;
    }

    public function addSpaceUser(user $spaceUser): self
    {
        if (!$this->space_user->contains($spaceUser)) {
            $this->space_user->add($spaceUser);
        }

        return $this;
    }

    public function removeSpaceUser(user $spaceUser): self
    {
        $this->space_user->removeElement($spaceUser);

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
            $file->setSpace($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getSpace() === $this) {
                $file->setSpace(null);
            }
        }

        return $this;
    }
}
