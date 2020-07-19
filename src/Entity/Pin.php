<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\PinRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PinRepository::class)
 * @ORM\Table(name="pins")
 * @ORM\HasLifecycleCallbacks()
 */
class Pin
{
    use Timestampable;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Sorry, title can't be blank")
     * @Assert\Length(min=3, minMessage="Title is too short !")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Sorry, description can't be blank")
     * @Assert\Length(min=10, minMessage="Description is too short !")
     */
    private $description;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
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
}
