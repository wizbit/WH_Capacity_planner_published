<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ForecastOrders
 *
 * @ORM\Table(name="forecast_orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ForecastOrderRepository")
 */
class ForecastOrder
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
     * @var Owner
     *
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="forecastOrders", cascade={"persist"})
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ForecastOrderItem", mappedBy="forecastOrder", cascade={"persist"})
     */
    private $forecastOrderItems;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shippedDate", type="date")
     */
    private $shippedDate;

    /**
     * ForecastOrder constructor.
     */
    public function __construct()
    {
        $this->forecastOrderItems = new ArrayCollection();
    }

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
     * Set owner
     *
     * @param Owner $owner
     *
     * @return ForecastOrder
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

    /**
     * Set shippedDate
     *
     * @param \DateTime $shippedDate
     *
     * @return ForecastOrder
     */
    public function setShippedDate($shippedDate)
    {
        $this->shippedDate = $shippedDate;

        return $this;
    }

    /**
     * Get shippedDate
     *
     * @return \DateTime
     */
    public function getShippedDate()
    {
        return $this->shippedDate;
    }

    /**
     * @return Collection
     */
    public function getForecastOrderItems()
    {
        return $this->forecastOrderItems;
    }

    public function addItem($item, $q)
    {
        $this->forecastOrderItems->add(new ForecastOrderItem($this, $item, $q));
    }
}

