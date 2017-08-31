<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActualInbound
 *
 * @ORM\Table(name="actual_inbound")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActualInboundRepository")
 */
class ActualInbound
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
     * @ORM\Column(name="recDate", type="date")
     */
    private $recDate;

    /**
     * @var int
     *
     * @ORM\Column(name="recQty", type="integer")
     */
    private $recQty;

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
     * @return ActualInbound
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
     * Set recDate
     *
     * @param \DateTime $recDate
     *
     * @return ActualInbound
     */
    public function setRecDate($recDate)
    {
        $this->recDate = $recDate;

        return $this;
    }

    /**
     * Get recDate
     *
     * @return \DateTime
     */
    public function getRecDate()
    {
        return $this->recDate;
    }

    /**
     * Set recQty
     *
     * @param integer $recQty
     *
     * @return ActualInbound
     */
    public function setRecQty($recQty)
    {
        $this->recQty = $recQty;

        return $this;
    }

    /**
     * Get recQty
     *
     * @return int
     */
    public function getRecQty()
    {
        return $this->recQty;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return ActualInbound
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

