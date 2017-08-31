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
     * @var string
     *
     * @ORM\Column(name="itemCode", type="string", length=50)
     */
    private $itemCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expRecDate", type="date")
     */
    private $expRecDate;

    /**
     * @var int
     *
     * @ORM\Column(name="expRecQty", type="integer")
     */
    private $expRecQty;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=50)
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
     * @return ForecastInbound
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
     * Set expRecQty
     *
     * @param integer $expRecQty
     *
     * @return ForecastInbound
     */
    public function setExpRecQty($expRecQty)
    {
        $this->expRecQty = $expRecQty;

        return $this;
    }

    /**
     * Get expRecQty
     *
     * @return int
     */
    public function getExpRecQty()
    {
        return $this->expRecQty;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return ForecastInbound
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

