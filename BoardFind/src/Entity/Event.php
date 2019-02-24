<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;

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
    protected $eventDay;

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
     * @ORM\Column(type="integer")
     */
    private $eventownerid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="events")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isdeleted;

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
        $this->eventDay = $day;
    }

    public function getEventday()
    {
        return $this->eventDay;
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

    public function getUser() : ?User
    {
        return $this->user;
    }

    public function setUser(?User $usert)
    {
        $this->user = $usert;
    }

}