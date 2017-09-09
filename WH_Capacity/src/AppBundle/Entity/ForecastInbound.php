<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForecastInbound
 *
 * @ORM\Table(name="forecast_inbound")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ForecastInboundRepository")
 */
class ForecastInbound
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
     * @var Item
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Item")
     */
    private $item;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expRecDate", type="date")
     */
    private $expRecDate;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var Owner
     *
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="forecastInbound", cascade={"persist"})
     */
    private $owner;

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
     * Set itemCode
     *
     * @param Item $item
     *
     * @return ForecastInbound
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get itemCode
     *
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set expRecDate
     *
     * @param \DateTime $expRecDate
     *
     * @return ForecastInbound
     */
    public function setExpRecDate($expRecDate)
    {
        $this->expRecDate = $expRecDate;

        return $this;
    }

    /**
     * Get expRecDate
     *
     * @return \DateTime
     */
    public function getExpRecDate()
    {
        return $this->expRecDate;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return ForecastInbound
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set owner
     *
     * @param Owner $owner
     *
     * @return ForecastInbound
     */
    public function setOwner(Owner $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return Owner
     */
    public function getOwner(): Owner
    {
        return $this->owner;
    }
}

