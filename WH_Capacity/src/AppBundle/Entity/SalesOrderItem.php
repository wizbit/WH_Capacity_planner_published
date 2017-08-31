<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sales_order_item")
 */
class SalesOrderItem
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SalesOrder", inversedBy="salesOrderItems")
     * @var SalesOrder
     */
    private $salesOrder;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Item")
     * @var Item
     */
    private $item;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $quantity;

    /**
     * SalesOrderItem constructor.
     * @param $salesOrder
     * @param $item
     * @param $quantity
     */
    public function __construct(SalesOrder $salesOrder, Item $item, $quantity)
    {
        $this->salesOrder = $salesOrder;
        $this->item = $item;
        $this->quantity = $quantity;
    }

    /**
     * @return SalesOrder
     */
    public function getSalesOrder()
    {
        return $this->salesOrder;
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}