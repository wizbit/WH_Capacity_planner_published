<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * openingBalance
 *
 * @ORM\Table(name="opening_balance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\openingBalanceRepository")
 */
class openingBalance
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
     * @var string
     *
     * @ORM\Column(name="locationType", type="string", length=25)
     */
    private $locationType;

    /**
     * @var int
     *
     * @ORM\Column(name="openingQty", type="integer")
     */
    private $openingQty;

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
     * @return openingBalance
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
     * Set locationType
     *
     * @param string $locationType
     *
     * @return openingBalance
     */
    public function setLocationType($locationType)
    {
        $this->locationType = $locationType;

        return $this;
    }

    /**
     * Get locationType
     *
     * @return string
     */
    public function getLocationType()
    {
        return $this->locationType;
    }

    /**
     * Set openingQty
     *
     * @param integer $openingQty
     *
     * @return openingBalance
     */
    public function setOpeningQty($openingQty)
    {
        $this->openingQty = $openingQty;

        return $this;
    }

    /**
     * Get openingQty
     *
     * @return int
     */
    public function getOpeningQty()
    {
        return $this->openingQty;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return openingBalance
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

