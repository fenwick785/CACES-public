<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $role = 'ROLE_USER';

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $question;

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
    public function getUsername(): string
    {
        return (string) $this->email;
    }


    
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
       return [$this->role];
    }

    public function getRole(): string
    {
        return  $this->role;
    }

    public function setRole($role): self
    {
        $this->role = $role;
        return $this;
    }



// DEBUT POUR MDP OUBLIE


    /**
     * @var string le token qui servira lors de l'oubli de mot de passe
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $resetToken;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Userlesson", mappedBy="idUser")
     */
    private $userlessons;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResultEvaluate", mappedBy="idUser")
     */
    private $resultEvaluates;

    public function __construct()
    {
        $this->userlessons = new ArrayCollection();
        $this->resultEvaluates = new ArrayCollection();
    }

 
    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->resetToken;
    }
 
    /**
     * @param string $resetToken
     */
    public function setResetToken(?string $resetToken): void
    {
        $this->resetToken = $resetToken;
    }

// FIN POUR MDP OUBLIE









    // /**
    //  * @see UserInterface
    //  */
    // public function getRoles(): array
    // {
    //     $roles = $this->roles;
    //     // guarantee every user at least has ROLE_USER
    //     // $roles=[];

    //     return array_unique($roles);
    // }

    // public function setRoles(array $roles): self
    // {
    //     $this->roles = $roles;

    //     return $this;
    // }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getQuestion(): ?bool
    {
        return $this->question;
    }

    public function setQuestion(bool $question): self
    {
        $this->question = $question;

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
            $userlesson->setIdUser($this);
        }

        return $this;
    }

    public function removeUserlesson(Userlesson $userlesson): self
    {
        if ($this->userlessons->contains($userlesson)) {
            $this->userlessons->removeElement($userlesson);
            // set the owning side to null (unless already changed)
            if ($userlesson->getIdUser() === $this) {
                $userlesson->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ResultEvaluate[]
     */
    public function getResultEvaluates(): Collection
    {
        return $this->resultEvaluates;
    }

    public function addResultEvaluate(ResultEvaluate $resultEvaluate): self
    {
        if (!$this->resultEvaluates->contains($resultEvaluate)) {
            $this->resultEvaluates[] = $resultEvaluate;
            $resultEvaluate->setIdUser($this);
        }

        return $this;
    }

    public function removeResultEvaluate(ResultEvaluate $resultEvaluate): self
    {
        if ($this->resultEvaluates->contains($resultEvaluate)) {
            $this->resultEvaluates->removeElement($resultEvaluate);
            // set the owning side to null (unless already changed)
            if ($resultEvaluate->getIdUser() === $this) {
                $resultEvaluate->setIdUser(null);
            }
        }

        return $this;
    }


}
