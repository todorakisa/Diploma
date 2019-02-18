<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $latitude;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $longitude;

    /**
     * @Assert\Date
     * @var string A "d-m-Y" formatted value
     */
    protected $eventday;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 20)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max = 4096)
     */
    private $placedescription;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $eventownerid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $n)
    {
        $this->name = $n;
    }

    public function getDate(): ?date
    {
        return $this->eventday;
    }

    public function setDate(date $day)
    {
        $this->eventday = $day;
    }

    public function getLatitude(): ?double
    {
        return $this->latitude;
    }

    public function setLatitude(double $lat)
    {
        $this->latitude = $lat;
    }

    public function getLongitude(): ?double
    {
        return $this->longitude;
    }

    public function setLongitude(double $lon)
    {
        $this->longitude = $lan;
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
}