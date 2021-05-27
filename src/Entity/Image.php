<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $image_id;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $image_name;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $image_desc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $image_width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $image_height;

    /**
     * @ORM\Column(type="datetime")
     */
    private $image_time_create;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="image")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Album::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $album;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=ImageType::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageId(): ?int
    {
        return $this->image_id;
    }

    public function setImageId(int $image_id): self
    {
        $this->image_id = $image_id;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(?string $image_name): self
    {
        $this->image_name = $image_name;

        return $this;
    }

    public function getImageDesc(): ?string
    {
        return $this->image_desc;
    }

    public function setImageDesc(?string $image_desc): self
    {
        $this->image_desc = $image_desc;

        return $this;
    }

    public function getImageWidth(): ?int
    {
        return $this->image_width;
    }

    public function setImageWidth(?int $image_width): self
    {
        $this->image_width = $image_width;

        return $this;
    }

    public function getImageHeight(): ?int
    {
        return $this->image_height;
    }

    public function setImageHeight(?int $image_height): self
    {
        $this->image_height = $image_height;

        return $this;
    }

    public function getImageTimeCreate(): ?\DateTimeInterface
    {
        return $this->image_time_create;
    }

    public function setImageTimeCreate(\DateTimeInterface $image_time_create): self
    {
        $this->image_time_create = $image_time_create;

        return $this;
    }


    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setImage($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getImage() === $this) {
                $comment->setImage(null);
            }
        }

        return $this;
    }

    public function getAlbum(): ?album
    {
        return $this->album;
    }

    public function setAlbum(?album $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?ImageType
    {
        return $this->type;
    }

    public function setType(?ImageType $type): self
    {
        $this->type = $type;

        return $this;
    }

}

