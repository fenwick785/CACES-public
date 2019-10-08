<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserlessonRepository")
 */
class Userlesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userlessons")
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lesson", inversedBy="userlessons")
     */
    private $idLesson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $state;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdLesson(): ?Lesson
    {
        return $this->idLesson;
    }

    public function setIdLesson(?Lesson $idLesson): self
    {
        $this->idLesson = $idLesson;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }
}
