<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 20)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TradeOffer", mappedBy="usertrade")
     */
    private $tradeoffers;

    /**
     * One User has many events.
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="owner")
     */
    private $events;

    /**
     * Many Users have Many Events.
     * @ORM\ManyToMany(targetEntity="App\Entity\Event", mappedBy="event_participants")
     */
    private $participant_events;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isadmin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isdeleted;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->tradeoffers = new ArrayCollection();
        $this->participant_events = new ArrayCollection();
    }

    public function getParticipationOnEvents()
    {
        return $this->participant_events;
    }

    public function addParticipationOnEvent(?Event $event)
    {
        return $this->participant_events->add($event);
    }

    public function removeParticipationOnEvent(?Event $event)
    {
        return $this->participant_events->remove($event);
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function addEvent(?Event $event)
    {
        return $this->events->add($event);
    }

    public function removeEvent(?Event $event)
    {
        return $this->tradeoffers->remove($event);
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

    public function getProducts()
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

    public function getIsDeleted(): ?bool
    {
        return $this->isdeleted;
    }

    public function setIsDeleted(bool $bool)
    {
        $this->isdeleted = $bool;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $tel)
    {
        $this->telephone = $tel;
    }

}
