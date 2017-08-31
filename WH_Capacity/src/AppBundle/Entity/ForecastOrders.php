<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ForecastOrders
 *
 * @ORM\Table(name="forecast_orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ForecastOrdersRepository")
 */
class ForecastOrders
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
     * @ORM\Column(name="Owner", type="string", length=50)
     */
    private $owner;

    /**
     * @var string
     *
     * @ORM\Column(name="itemCode", type="string", length=50)
     */
    private $itemCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shippedDate", type="date")
     */
    private $shippedDate;

    /**
     * @var int
     *
     * @ORM\Column(name="qtyShipped", type="integer")
     */
    private $qtyShipped;


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
     * @param string $owner
     *
     * @return ForecastOrders
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
     * Set itemCode
     *
     * @param string $itemCode
     *
     * @return ForecastOrders
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    /**
     * Get itemCode
     *
     * @return string
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * Set shippedDate
     *
     * @param \DateTime $shippedDate
     *
     * @return ForecastOrders
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
     * Set qtyShipped
     *
     * @param integer $qtyShipped
     *
     * @return ForecastOrders
     */
    public function setQtyShipped($qtyShipped)
    {
        $this->qtyShipped = $qtyShipped;

        return $this;
    }

    /**
     * Get qtyShipped
     *
     * @return int
     */
    public function getQtyShipped()
    {
        return $this->qtyShipped;
    }
}

