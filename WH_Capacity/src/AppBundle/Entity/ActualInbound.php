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
     * @var Item
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Item")
     */
    private $item;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="recDate", type="date")
     */
    private $recDate;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var Owner
     *
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="actualInbound", cascade={"all"})
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
     * @return ActualInbound
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return ActualInbound
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
     * @return ActualInbound
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

