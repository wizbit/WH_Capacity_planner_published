<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationsRepository")
 */
class Locations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=25)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="decimal", precision=10, scale=2)
     */
    private $length;

    /**
     * @var int
     *
     * @ORM\Column(name="weightLimit", type="integer")
     */
    private $weightLimit;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="decimal", precision=10, scale=2)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="decimal", precision=10, scale=2)
     */
    private $width;

    /**
     * @var string
     *
     * @ORM\Column(name="ABC", type="string", length=2)
     */
    private $aBC;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=50)
     */
    private $owner;

    /**
     * @var int
     *
     * @ORM\Column(name="qty", type="integer")
     */
    private $qty;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Locations
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return Locations
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set length
     *
     * @param string $length
     *
     * @return Locations
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set weightLimit
     *
     * @param integer $weightLimit
     *
     * @return Locations
     */
    public function setWeightLimit($weightLimit)
    {
        $this->weightLimit = $weightLimit;

        return $this;
    }

    /**
     * Get weightLimit
     *
     * @return int
     */
    public function getWeightLimit()
    {
        return $this->weightLimit;
    }

    /**
     * Set height
     *
     * @param string $height
     *
     * @return Locations
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param string $width
     *
     * @return Locations
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set aBC
     *
     * @param string $aBC
     *
     * @return Locations
     */
    public function setABC($aBC)
    {
        $this->aBC = $aBC;

        return $this;
    }

    /**
     * Get aBC
     *
     * @return string
     */
    public function getABC()
    {
        return $this->aBC;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return Locations
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     *
     * @return Locations
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }
}

