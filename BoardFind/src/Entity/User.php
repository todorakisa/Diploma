<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 20)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 20,min = 6)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 20)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 20)
     */
    private $lastname;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TradeOffer", mappedBy="usertrade")
     */
    private $tradeoffers;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Length(max = 4096)
     */
    private $isadmin;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Length(max = 4096)
     */
    private $isadmin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function __construct()
    {
        $this->tradeoffers = new ArrayCollection();
    }

    /**
     * @return Collection|TradeOffer[]
     */
    public function getProducts(): ?ArrayCollection
    {
        return $this->tradeoffers;
    }

    public function addProduct(?TradeOffer $offer)
    {
        return $this->tradeoffers->add($offer);
    }

    public function removeProduct(?TradeOffer $offer)
    {
        return $this->tradeoffers->remove($offer);
    }

    public function getIsadmin(): ?bool
    {
        return $this->isadmin;
    }

    public function setIsadmin(bool $bool)
    {
        $this->isadmin = $bool;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $n)
    {
        $this->name = $n;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(string $name)
    {
        $this->lastname = $name;
    }

}
