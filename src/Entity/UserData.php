<?php

namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserDataRepository::class)
 */
class UserData
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
    private $user_id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $user_email;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $user_first_name;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $user_last_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_icon;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserFirstName(): ?string
    {
        return $this->user_first_name;
    }

    public function setUserFirstName(?string $user_first_name): self
    {
        $this->user_first_name = $user_first_name;

        return $this;
    }

    public function getUserLastName(): ?string
    {
        return $this->user_last_name;
    }

    public function setUserLastName(?string $user_last_name): self
    {
        $this->user_last_name = $user_last_name;

        return $this;
    }

    public function getUserIcon(): ?string
    {
        return $this->user_icon;
    }

    public function setUserIcon(?string $user_icon): self
    {
        $this->user_icon = $user_icon;

        return $this;
    }
}
