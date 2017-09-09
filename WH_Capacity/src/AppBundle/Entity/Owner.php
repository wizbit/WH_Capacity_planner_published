<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="owner")
 */
class Owner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SalesOrder", mappedBy="owner", cascade={"persist"})
     * @var Collection<SalesOrder>
     */
    private $salesOrders;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ForecastOrder", mappedBy="owner", cascade={"persist"})
     * @var Collection<ForecastOrder>
     */
    private $forecastOrders;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Location", mappedBy="owner", cascade={"persist"})
     * @var Collection<Location>
     */
    private $locations;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ActualInbound", mappedBy="owner", cascade={"persist"})
     * @var Collection<ActualInbound>
     */
    private $actualInbounds;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ForecastInbound", mappedBy="owner", cascade={"persist"})
     * @var Collection<ForecastInbound>
     */
    private $forecastInbounds;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Item", mappedBy="owner", cascade={"persist"})
     * @var Collection<Item>
     */
    private $items;

    /**
     * Owner constructor.
     */
    public function __construct()
    {
        $this->salesOrders = new ArrayCollection();
        $this->forecastOrders = new ArrayCollection();
        $this->locations = new ArrayCollection();
        $this->actualInbounds = new ArrayCollection();
        $this->forecastInbounds = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getSalesOrders(): Collection
    {
        return $this->salesOrders;
    }

    /**
     * @return mixed
     */
    public function getForecastOrders()
    {
        return $this->forecastOrders;
    }

    /**
     * @return Collection
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    /**
     * @return Collection
     */
    public function getActualInbounds(): Collection
    {
        return $this->actualInbounds;
    }

    /**
     * @return Collection
     */
    public function getForecastInbounds(): Collection
    {
        return $this->forecastInbounds;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }
}