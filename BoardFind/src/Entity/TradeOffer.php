<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TradeOfferRepository")
 */
class TradeOffer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    protected $traderemail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max = 200)
     */
    private $tradername;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max = 200)
     */
    private $traderlastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max = 200)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max = 200)
     */
    private $nameofgame;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 200)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max = 4096)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tradeoffers")
     */
    private $usertrade;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max = 20)
     */
    private $numbertelephone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isdeleted;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraderEmail() : ?string
    {
        return $this->traderemail;
    }

    public function setTraderEmail(string $email)
    {
        $this->traderemail = $email;
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

    public function getTraderName() : ?string
    {
        return $this->tradername;
    }

    public function setTraderName(string $name)
    {
        $this->tradername = $name;
    }

    public function getTraderLastName() : ?string
    {
        return $this->traderlastname;
    }

    public function setTraderLastName(string $name)
    {
        $this->traderlastname = $name;
    }

    public function getPrice() : ?string
    {
        return $this->price;
    }

    public function setPrice(string $number)
    {
        $this->price = $number;
    }

    public function getNameOfGame() : ?string
    {
        return $this->nameofgame;
    }

    public function setNameOfGame(string $name)
    {
        $this->nameofgame = $name;
    }

    public function getTitle() : ?string
    {
        return $this->title;
    }

    public function setTitle(string $name)
    {
        $this->title = $name;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(string $text)
    {
        $this->description = $text;
    }

    public function getUser() : ?User
    {
        return $this->usertrade;
    }

    public function setUser(?User $usert)
    {
        $this->usertrade = $usert;
    }

    public function setNumberTelephone(string $number)
    {
        $this->numbertelephone = $number;
    }

    public function getNumberTelephone() : ?string
    {
        return $this->numbertelephone;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isdeleted;
    }

    public function setIsDeleted(bool $bool)
    {
        $this->isdeleted = $bool;
    }
}
