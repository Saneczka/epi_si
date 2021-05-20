<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 */
class Album
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
    private $album_id;

    /**
     * @ORM\Column(type="string", length=600)
     */
    private $album_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $album_time_create;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAlbumName(): ?string
    {
        return $this->album_name;
    }

    public function setAlbumName(string $album_name): self
    {
        $this->album_name = $album_name;

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

    public function getAlbumTimeCreate(): ?\DateTimeInterface
    {
        return $this->album_time_create;
    }

    public function setAlbumTimeCreate(\DateTimeInterface $album_time_create): self
    {
        $this->album_time_create = $album_time_create;

        return $this;
    }
}
