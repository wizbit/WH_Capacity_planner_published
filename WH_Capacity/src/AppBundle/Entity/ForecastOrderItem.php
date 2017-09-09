<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="forecast_order_item")
 */
class ForecastOrderItem
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ForecastOrder", inversedBy="forecastOrderItems")
     * @var ForecastOrder
     */
    private $forecastOrder;

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
     * @param $forecastOrder
     * @param $item
     * @param $quantity
     */
    public function __construct(ForecastOrder $forecastOrder, Item $item, $quantity)
    {
        $this->forecastOrder = $forecastOrder;
        $this->item = $item;
        $this->quantity = $quantity;
    }

    /**
     * @return ForecastOrder
     */
    public function getForecastOrder()
    {
        return $this->forecastOrder;
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