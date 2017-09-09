<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SalesOrder
 *
 * @ORM\Table(name="sales_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalesOrderRepository")
 */
class SalesOrder
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
     * @ORM\Column(name="orderRef", type="string", length=255, unique=true)
     */
    private $orderRef;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOrdered", type="datetime")
     */
    private $dateOrdered;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateShipped", type="datetime", nullable=true)
     */
    private $dateShipped;

    /**
     * @ORM\OneToMany(targetEntity="SalesOrderItem", mappedBy="salesOrder", cascade={"persist","remove"}, orphanRemoval=true)
     */
    private $salesOrderItems;

    /**
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="salesOrders", cascade={"persist"})
     */
    private $owner;

    /**
     * SalesOrder constructor.
     */
    public function __construct()
    {
        $this->salesOrderItems = new ArrayCollection();
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
     * Set orderRef
     *
     * @param string $orderRef
     *
     * @return SalesOrder
     */
    public function setOrderRef($orderRef)
    {
        $this->orderRef = $orderRef;

        return $this;
    }

    /**
     * Get orderRef
     *
     * @return string
     */
    public function getOrderRef()
    {
        return $this->orderRef;
    }

    /**
     * Set dateOrdered
     *
     * @param \DateTime $dateOrdered
     *
     * @return SalesOrder
     */
    public function setDateOrdered($dateOrdered)
    {
        $this->dateOrdered = $dateOrdered;

        return $this;
    }

    /**
     * Get dateOrdered
     *
     * @return \DateTime
     */
    public function getDateOrdered()
    {
        return $this->dateOrdered;
    }

    /**
     * Set dateShipped
     *
     * @param \DateTime $dateShipped
     *
     * @return SalesOrder
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
     * @return mixed
     */
    public function getSalesOrderItems()
    {
        return $this->salesOrderItems;
    }

    public function addItem($item, $q)
    {
        $this->salesOrderItems->add(new SalesOrderItem($this, $item, $q));
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param Owner $owner
     */
    public function setOwner(Owner $owner)
    {
        $this->owner = $owner;
        $this->owner->getSalesOrders()->add($this);
    }
}

