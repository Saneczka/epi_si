<?php

namespace App\Entity;

use App\Repository\ImageTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageTypeRepository::class)
 */
class ImageType
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
    private $type_id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $image_type;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImageType(): ?string
    {
        return $this->image_type;
    }

    public function setImageType(string $image_type): self
    {
        $this->image_type = $image_type;

        return $this;
    }
}
