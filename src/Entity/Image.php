<?php

namespace App\Entity;

use App\Repository\ImageRepository;
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
     * @ORM\Column(type="integer")
     */
    private $album_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $image_time_create;

    /**
     * @ORM\Column(type="integer")
     */
    private $type_id;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $image_col;

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

    public function getAlbumId(): ?int
    {
        return $this->album_id;
    }

    public function setAlbumId(int $album_id): self
    {
        $this->album_id = $album_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

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

    public function getTypeId(): ?int
    {
        return $this->type_id;
    }

    public function setTypeId(int $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function getImageCol(): ?string
    {
        return $this->image_col;
    }

    public function setImageCol(?string $image_col): self
    {
        $this->image_col = $image_col;

        return $this;
    }
}
