<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 */
class Lesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Chapter;

    /**
     * @ORM\Column(type="integer")
     */
    private $Part;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Video;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $T1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $P1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $T2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $P2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $T3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $P3;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Userlesson", mappedBy="idLesson")
     */
    private $userlessons;

    /**
     * @ORM\Column(type="integer")
     */
    private $idLesson;

    public function __construct()
    {
        $this->userlessons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChapter(): ?int
    {
        return $this->Chapter;
    }

    public function setChapter(int $Chapter): self
    {
        $this->Chapter = $Chapter;

        return $this;
    }

    public function getPart(): ?int
    {
        return $this->Part;
    }

    public function setPart(int $Part): self
    {
        $this->Part = $Part;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->Video;
    }

    public function setVideo(?string $Video): self
    {
        $this->Video = $Video;

        return $this;
    }

    public function getT1(): ?string
    {
        return $this->T1;
    }

    public function setT1(?string $T1): self
    {
        $this->T1 = $T1;

        return $this;
    }

    public function getP1(): ?string
    {
        return $this->P1;
    }

    public function setP1(?string $P1): self
    {
        $this->P1 = $P1;

        return $this;
    }

    public function getT2(): ?string
    {
        return $this->T2;
    }

    public function setT2(?string $T2): self
    {
        $this->T2 = $T2;

        return $this;
    }

    public function getP2(): ?string
    {
        return $this->P2;
    }

    public function setP2(?string $P2): self
    {
        $this->P2 = $P2;

        return $this;
    }

    public function getT3(): ?string
    {
        return $this->T3;
    }

    public function setT3(?string $T3): self
    {
        $this->T3 = $T3;

        return $this;
    }

    public function getP3(): ?string
    {
        return $this->P3;
    }

    public function setP3(?string $P3): self
    {
        $this->P3 = $P3;

        return $this;
    }

    /**
     * @return Collection|Userlesson[]
     */
    public function getUserlessons(): Collection
    {
        return $this->userlessons;
    }

    public function addUserlesson(Userlesson $userlesson): self
    {
        if (!$this->userlessons->contains($userlesson)) {
            $this->userlessons[] = $userlesson;
            $userlesson->setIdLesson($this);
        }

        return $this;
    }

    public function removeUserlesson(Userlesson $userlesson): self
    {
        if ($this->userlessons->contains($userlesson)) {
            $this->userlessons->removeElement($userlesson);
            // set the owning side to null (unless already changed)
            if ($userlesson->getIdLesson() === $this) {
                $userlesson->setIdLesson(null);
            }
        }

        return $this;
    }

    public function getIdLesson(): ?int
    {
        return $this->idLesson;
    }

    public function setIdLesson(int $idLesson): self
    {
        $this->idLesson = $idLesson;

        return $this;
    }
}
