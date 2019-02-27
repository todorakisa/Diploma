<?php

namespace App\Entity;

use Appp\Entity\User;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $longitude;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Type("\DateTime")
     * @Assert\NotBlank()
     */
    protected $event_day;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max = 20)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(max = 4096)
     */
    private $placedescription;


    /**
     * Many events has one owner. This is the inverse side.
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="events")
     */
    private $owner;

    /**
     * Many Events have Many Users.
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="participant_events")
     */
    private $event_participants;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isdeleted;

    public function __construct() {
        $this->event_participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getParticipants()
    {
        return $this->event_participants;
    }

    public function addParticipant($user)
    {
        return $this->event_participants->add($user);
    }

    public function removeParticipant($user)
    {
        return $this->event_participants->remove($user);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $t)
    {
        $this->title = $t;
    }

    public function setEventday($day)
    {
        $this->event_day = $day;
    }

    public function getEventday()
    {
        return $this->event_day;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($lat)
    {
        $this->latitude = $lat;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($lon)
    {
        $this->longitude = $lon;
    }

    public function getPlaceDescription() : ?string
    {
        return $this->placedescription;
    }

    public function setPlaceDescription(string $text)
    {
        $this->placedescription = $text;
    }

    public function getEventOwnerId(): ?int
    {
        return $this->eventownerid;
    }

    public function setEventOwnerId(int $id)
    {
        return $this->eventownerid = $id;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isdeleted;
    }

    public function setIsDeleted(bool $bool)
    {
        $this->isdeleted = $bool;
    }

    public function getUser()
    {
        return $this->owner;
    }

    public function setUser($usert)
    {
        $this->owner = $usert;
    }

}