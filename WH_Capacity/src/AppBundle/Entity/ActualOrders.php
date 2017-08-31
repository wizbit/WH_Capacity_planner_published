<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualOrders
 *
 * @ORM\Table(name="actual_orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActualOrdersRepository")
 */
class ActualOrders
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
     * @ORM\Column(name="ItemCode", type="string", length=50)
     */
    private $itemCode;

    /**
     * @var int
     *
     * @ORM\Column(name="QtyShipped", type="integer")
     */
    private $qtyShipped;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateShipped", type="date")
     */
    private $dateShipped;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TimeShipped", type="time")
     */
    private $timeShipped;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderID", type="string", length=50, nullable=true)
     */
    private $orderID;

    /**
     * @var string
     *
     * @ORM\Column(name="Zone", type="string", length=10, nullable=true)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="Owner", type="string", length=50)
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
     * @param string $itemCode
     *
     * @return ActualOrders
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
     * Set qtyShipped
     *
     * @param integer $qtyShipped
     *
     * @return ActualOrders
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

    /**
     * Set dateShipped
     *
     * @param \DateTime $dateShipped
     *
     * @return ActualOrders
     */
    public function setDateShipped($dateShipped)
    {
        $this->dateShipped = $dateShipped;

        return $this;
    }

    /**
     * Get dateShipped
     *
     * @return \DateTime
     */
    public function getDateShipped()
    {
        return $this->dateShipped;
    }

    /**
     * Set timeShipped
     *
     * @param \DateTime $timeShipped
     *
     * @return ActualOrders
     */
    public function setTimeShipped($timeShipped)
    {
        $this->timeShipped = $timeShipped;

        return $this;
    }

    /**
     * Get timeShipped
     *
     * @return \DateTime
     */
    public function getTimeShipped()
    {
        return $this->timeShipped;
    }

    /**
     * Set orderID
     *
     * @param string $orderID
     *
     * @return ActualOrders
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;

        return $this;
    }

    /**
     * Get orderID
     *
     * @return string
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return ActualOrders
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
     * Set owner
     *
     * @param string $owner
     *
     * @return ActualOrders
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
}

